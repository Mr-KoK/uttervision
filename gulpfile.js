var gulp = require("gulp");
var sass = require('gulp-sass')(require('sass'));
var autoprefixer = require('autoprefixer');
var cleanCSS = require('gulp-clean-css');
var uglify = require("gulp-uglify");
var concat = require("gulp-concat");
var postcss = require("gulp-postcss");
var cssnano = require("cssnano");
var rename = require('gulp-rename');
var rev = require('gulp-rev');
const minify = require("gulp-minify");


var paths = {
    styles: {
        src: "./resources/assets/sass/**/*.scss",
        dest: "./public/assets/css/cpp",
        rev: "./public/assets/css/cpp/*.css",
    } ,
    scripts: {
        src: "./resources/assets/js/*.js",
        dest: "./public/assets/js",
        rev: "./public/assets/js/*.js",
    }
};


function sassCompile() {
    return gulp.src(paths.styles.src)
        .pipe(sass())
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 99 versions'],
        }))
        .pipe(gulp.dest(paths.styles.dest))
}

function minifyCss() {
    return gulp
        .src('./browser/resources/css/*.css')
        .pipe(cleanCSS())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('./browser/resources/css'));
}

function scssTask() {
    return gulp
        .src(paths.styles.src)
        .pipe(sass())
        .pipe(postcss([autoprefixer({overrideBrowserslist: ['last 99 versions']}), cssnano()]))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(paths.styles.dest))
}

function minifyJs() {
    return gulp
        .src(paths.scripts.src, paths.scripts.min)
        .pipe(minify(
            {
                ext: {
                    min: '.min.js'
                },
                noSource: true,
                ignoreFiles: ['*.min.min.js']
            }
        ))
        .pipe(gulp.dest(paths.scripts.dest))
}

function jsTask() {
    return gulp
        .src('./js/*.js')
        .pipe(concat('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./app')
        );
}

function addRev() {
    return gulp.src(paths.styles.rev)
        .pipe(rev())
        .pipe(gulp.dest('Dto'))
}

function addVersion() {
    return gulp.src(paths.styles.rev)
        .pipe(rev())
        .pipe(gulp.dest('Dto'))
}

function watch() {
    gulp.watch(paths.styles.src, scssTask);
    // gulp.watch('./browser/resources/scss/*.scss', sassCompile);
    // gulp.watch('./browser/resources/css/*.css', minifyCss);
    // gulp.watch('./js/*.js', jsTask);
}


exports.sassCompile = sassCompile;
exports.minifyCss = minifyCss;
exports.jsTask = jsTask;
exports.scssTask = scssTask;
exports.minifyJs = minifyJs;
exports.watch = watch;
exports.addRev = addRev;
exports.addVersion = addRev;

