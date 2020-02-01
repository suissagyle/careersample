"use strict";

var gulp = require("gulp"),
    sass = require("gulp-sass"),
    cssmin = require("gulp-cssmin"),
    rename = require("gulp-rename"),
    webserver = require("gulp-webserver");

gulp.task("careerdirect-saveHtml", function(){
  return gulp.src("./app/**/*.html");
});

gulp.task("careerdirect-minifyStyles", function(){
  return gulp.src("./app/scss/styles.scss")
    .pipe(sass())
    .pipe(cssmin())
    .pipe(rename({suffix: ".min"}))
    .pipe(gulp.dest("./app/css"))
});

gulp.task("careerdirect-dashboard-minifyStyles", function(){
  return gulp.src("./app/scss/dashboard.scss")
    .pipe(sass())
    .pipe(cssmin())
    .pipe(rename({suffix: ".min"}))
    .pipe(gulp.dest("./app/css"))
});

gulp.task("careerdirect-watch", function(){
  gulp.watch("./app/**/*.html", ["careerdirect-saveHtml"]);
  gulp.watch("./app/scss/**/*.scss", ["careerdirect-minifyStyles"]);
  gulp.watch("./app/scss/**/*.scss", ["careerdirect-dashboard-minifyStyles"]);
});


gulp.task("careerdirect-webserver", function() {
  gulp.src("./app")
    .pipe(webserver({
      host: "localhost",
      port: "9900",
      open: true
    }));
});

gulp.task("default", [
  "careerdirect-saveHtml",
  "careerdirect-minifyStyles",
  "careerdirect-dashboard-minifyStyles",
  "careerdirect-watch",
  "careerdirect-webserver"
]);