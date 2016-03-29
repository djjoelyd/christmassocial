(function() {
    'use strict';
}());

module.exports = function(grunt) {

    grunt.initConfig({

        // Project configuration
        pkg: grunt.file.readJSON('package.json'),

        // Compile Sass
        sass: {
            options: {
                style: 'compressed'
            },
            dist: {
                files: {
                    'dist/css/styles.min.css': 'dev/scss/styles.scss'
                }
            }
        },

        // Copy html files
        copy: {
            main: {
                files: [{
                    expand: true,
                    cwd: 'dev',
                    src: [
                        '**/*.html',
                        'images/{,*/}*.{png,jpg,gif,svg}',
                        'js/libs/*.js',
                        'fonts/{,*/}*.{eot,svg,ttf,woff,woff2,otf}'
                    ],
                    dest: 'dist'
                }]
            }

        },

        concat: {
            options: {},
            dist: {
                src: ['dev/js/*.js'],
                dest: 'dist/js/main.js'
            }
        },

        uglify: {
            options: {

            },
            dist: {
                files: {
                    'dist/js/main.min.js': 'dist/js/main.js'
                }
            }
        },

        jshint: {
            files: ['gruntfile.js', 'dev/js/*.js'],
            options: {
                globals: {
                    jQuery: true,
                    console: true,
                    module: true
                }
            }
        },

        //Browersync
        browserSync: {
            default_options: {
                bsFiles: {
                    src: [
                        "dist/css/*.css",
                        "dist/js/*.js",
                        "dist/*.html"
                    ]
                },
                options: {
                    watchTask: true,
                    server: {
                        baseDir: "./dist"
                    }
                }
            }
        },

        // Watch and build
        watch: {

            sass: {
                files: 'dev/scss/*.scss',
                tasks: ['sass'],
                options: {
                    livereload: true
                }
            },

            html: {
                files: ['dev/*.html'],
                tasks: ['copy'],
                options: {
                    livereload: true
                }
            },

            images: {
                files: ['dist/images/{,*/}*.{png,jpg,gif,svg}'],
                tasks: ['copy:images'],
                options: {
                    livereload: true
                }
            },

            js: {
                files: ['dist/js/**/*.js'],
                tasks: ['js'],
                options: {
                    livereload: true
                }
            }
        }

    });

    // Load dependencies
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-browser-sync');

    // Run tasks
    grunt.registerTask('default', ['browserSync', 'sass', 'concat', 'uglify', 'jshint', 'copy', 'watch', ]);

};