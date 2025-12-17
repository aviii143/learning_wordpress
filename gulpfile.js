const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));

// Paths
const paths = {
    scss: './src/scss/**/*.scss',
    css: './css'
};

// Compile SCSS
function compileSass() {
    return gulp.src(paths.scss)
        .pipe(sass({ outputStyle: 'expanded' }).on('error', sass.logError))
        .pipe(gulp.dest(paths.css));
}

// Watch SCSS changes
function watchSass() {
    gulp.watch(paths.scss, compileSass);
}

// Tasks
exports.sass = compileSass;
exports.watch = watchSass;
