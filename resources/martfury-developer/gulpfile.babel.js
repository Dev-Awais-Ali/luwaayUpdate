import {src, dest, watch, series, parallel} from 'gulp';
import sourcemaps from 'gulp-sourcemaps';
import sass from 'gulp-sass';
import pug from 'gulp-pug';
import postcss from 'gulp-postcss';
import autoprefixer from 'autoprefixer';
import cssnano from 'cssnano';
import browserSync from 'browser-sync';
import rename from "gulp-rename";
import del from 'del';
import prettyHtml from 'gulp-pretty-html';
import useref from 'gulp-useref';
import gulpif from 'gulp-if';
import uglify from 'gulp-uglify';
import data from 'gulp-data';
import merge from 'gulp-merge-json';
import path from 'path';

let fs = require('fs');

const server = browserSync.create();

const paths = {
    scss: 'app/scss/**/*.scss',
    scssBuild: 'app/scss/*.scss',
    pug: {
        data: 'app/pug/data/modules/**/*.json',
        components: 'app/pug/components/*.pug',
        layout: 'app/pug/layouts/**/*.pug',
        homepage: 'app/pug/layouts/homepage/*.pug',
        pages: 'app/pug/layouts/pages/*.pug',
        shop: 'app/pug/layouts/shop/*.pug',
        product: 'app/pug/layouts/product/*.pug',
        portfolio: 'app/pug/layouts/portfolio/*.pug',
        vendor: 'app/pug/layouts/vendor/*.pug',
        watchFiles: 'app/pug/**/*.pug'
    },
    img: 'static/img/**',
    plugins: "static/plugins/**",
    js: 'app/js/*.js',
    fonts: "static/fonts/**",
    html: "dist/*.html"
};

const developFiles = paths.pug.layout;

//const developFiles = "app/pug/layouts/shop/shop-default.pug";

export function scssDevelop() {
    return src(paths.scssBuild)
    // .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: "expanded"}))
        .pipe(postcss([autoprefixer()]))
        // .pipe(sourcemaps.write('.'))
        .pipe(dest('dist/css'))
        .pipe(server.stream());
}

export function scssProduction() {
    return src(paths.scss)
        .pipe(sass())
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(dest('dist/css'))
        .pipe(server.stream());
}

export function mergeData() {
    return src(paths.pug.data)
        .pipe(
            merge({
                fileName: 'data.json',
                edit: (json, file) => {
                    let filename = path.basename(file.path),
                        primaryKey = filename.replace(
                            path.extname(filename),
                            ''
                        );
                    var data = {};
                    data[primaryKey] = json;

                    return data;
                }
            })
        )
        .pipe(dest('app/pug/data'));
}

export function buildLayouts() {
    return src(developFiles)
        .pipe(
            data(function(file) {
                return JSON.parse(
                    fs.readFileSync('app/pug/data/data.json')
                );
            })
        )
        .pipe(
            pug({
                pretty: true
            })
        )
        .pipe(rename({dirname: ""}))
        .pipe(dest("dist"))
        .pipe(browserSync.stream({}));
}

export function buildHtml() {
    return src(paths.pug.layout)
        .pipe(
            pug({
                pretty: true
            })
        )
        .pipe(rename({dirname: ""}))
        .pipe(dest("dist"))
        .pipe(browserSync.stream({}));
}

export function copyJs() {
    return src(paths.js)
        .pipe(dest("dist/js"));
}

export function copyImages() {
    return src(paths.img)
        .pipe(dest('dist/img'));
}

export function copyPlugin() {
    return src(paths.plugins)
        .pipe(dest('dist/plugins'))
}

export function copyFonts() {
    return src(paths.fonts)
        .pipe(dest("dist/fonts"));
}

export function cleanOutput() {
    return del('dist')
}

export function cleanData() {
    return del('./app/pug/data/data.json');
}

export function concat() {
    return src(paths.html)
        .pipe(useref())
        .pipe(gulpif('dist/js/plugins.js', uglify()))
        .pipe(dest('dist'));
}

export function beatify() {
    return src(paths.html)
        .pipe(prettyHtml({
            indent_size: 4,
            indent_char: " ",
            unformatted: false,
            brace_style: "collapse"
        }))
        .pipe(dest('dist'));
}

export function serve(done) {
    server.init({
        server: {
            baseDir: "dist"
        },
        port: 3000
    });
    done();
}

export function serverReload(done) {
    server.reload();
    done();
}

function watchFile() {
    watch(paths.scss, scssDevelop);
    watch(paths.img, copyImages);
    watch(
        paths.pug.watchFiles,
        series(buildLayouts, serverReload)
    );
    watch(
        paths.pug.data,
        series(cleanData, mergeData, buildLayouts, serverReload)
    );
    watch(paths.js, series(copyJs, serverReload));
}

const develop = series(
    cleanOutput,
    cleanData,
    mergeData,
    parallel(
        buildLayouts,
        scssDevelop,
        copyPlugin,
        copyFonts,
        copyJs,
        copyImages
    ),
    beatify,
    serve,
    watchFile
);

const build = series(
    cleanOutput,
    cleanData,
    mergeData,
    parallel(
        buildHtml,
        scssProduction,
        copyPlugin,
        copyFonts,
        copyJs,
        copyImages,
    ),
    concat,
    beatify,
    concat,
);

const pretty = series(beatify);
const html = series(buildHtml, beatify);

exports.watch = watchFile();
exports.html = html;
exports.pretty = pretty;
exports.build = build;
exports.default = develop;
