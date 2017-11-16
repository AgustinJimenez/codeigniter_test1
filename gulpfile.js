var gulp = require('gulp');
var concat = require('gulp-concat')
var uglify = require('gulp-uglify')
var minifyCSS = require('gulp-minify-css')

var base_path = './node_modules/';
var bower_path = base_path + 'admin-lte/bower_components/';

gulp.task('minimize_fastclick', function() {

    return gulp.src(bower_path + 'fastclick/lib/fastclick.js')
        .pipe(uglify())
        .pipe(gulp.dest(bower_path + 'fastclick/lib'));

});

gulp.task('compile_js', ['minimize_fastclick'], function() {


    return gulp.src(
            [
                bower_path + 'jquery/dist/jquery.min.js',
                bower_path + 'bootstrap/dist/js/bootstrap.min.js',
                bower_path + 'fastclick/lib/fastclick.js',
                base_path + 'admin-lte/dist/js/adminlte.min.js'
            ]
        )
        .pipe(concat('js/app.min.js'))
        .pipe(gulp.dest('public'));

});

gulp.task('compile_css', function() {


    return gulp.src(
            [
                bower_path + 'bootstrap/dist/css/bootstrap.min.css',
                bower_path + 'font-awesome/css/font-awesome.min.css',
                bower_path + 'ionicons/css/ionicons.min.css',
                bower_path + 'datatables.net-bs/css/dataTables.bootstrap.min.css',
                base_path + 'admin-lte/dist/css/AdminLTE.min.css',
                base_path + 'admin-lte/dist/css/skins/_all-skins.min.css'
            ]
        )
        .pipe(concat('css/app.min.css'))
        .pipe(gulp.dest('public'));

});

gulp.task('copile_assets', ['compile_js', 'compile_css']);
/*
base_url('public/css/bootstrap.min.css'),
base_url('public/css/font-awesome.min.css'),
base_url('public/css/ionicons.min.css'),
base_url('public/css/dataTables.bootstrap.min.css'),
base_url('public/css/AdminLTE.min.css'),
base_url('public/css/skin-blue.min.css'),
base_url('public/css/app.css'),
*/