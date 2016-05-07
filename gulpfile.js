var gulp = require('gulp');
var config = require('./gulp.config')();
var del = require('del');

var $ = require('gulp-load-plugins')({lazy: true});


gulp.task('help',$.taskListing);

gulp.task('default',['help']);

gulp.task('clean-styles', function() {
    return clean(config.publicPath + 'css/*.css');
});
gulp.task('clean-js', function() {
    return clean(config.publicPath + 'js/*.js');
});
gulp.task('styles', ['clean-styles'],function () {
    log('Compiling Less -> CSS.');
    return gulp
        .src(config.less.src)
        .pipe($.plumber())
        .pipe($.less())
        .pipe($.autoprefixer({browsers: ['last 2 version', '> 5%']}))
        .pipe($.csso())
        .pipe($.concat(config.less.serve))
        .pipe(gulp.dest(config.less.dst))
});
gulp.task('jsFiles', ['clean-js'],function () {
    log('Compiling JS -> Minify JS.');
    return gulp
        .src(config.js.src)
        .pipe($.plumber())
        .pipe($.uglify())
        .pipe($.concat(config.js.serve))
        .pipe(gulp.dest(config.js.dst))
});

gulp.task('file-watcher',function(){
   gulp.watch([config.less.src],['styles'])
   gulp.watch([config.js.src],['jsFiles'])
});

function clean(path){
    log('Removing: ' + $.util.colors.red(path));
    return del(path);
}
function log(msg) {
    if (typeof(msg) === 'object') {
        for (var item in msg) {
            if (msg.hasOwnProperty(item)) {
                $.util.log($.util.colors.blue(msg[item]));
            }
        }
    } else {
        $.util.log($.util.colors.green(msg));
    }
}
