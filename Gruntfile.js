/**
 * GRUNT
 * http://gruntjs.com/getting-started
 * 
 * @param {type} grunt
 * @returns {undefined}
 */
module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        less: {
            dev: {
                options: {
                    paths: [""],
                    cleancss: true,
                    compress: true
                },
                files: {
                    "css/admin.min.css": "less/style/admin.min.less",
                    "css/all.min.css": "less/style/all.min.less",
                    "css/style.min.css": "less/style/style.min.less"
                }
            }
        },
//        autoprefixer: {
//            dist: {
//                files: {
//                    'style.min.css' : 'style.min.css'
//                }
//            }
//        },
        uglify: {
            my_target: {
                files: {
                    'jsmin/shortcode.min.js': [
                        'js/mb-sss-shortcode.js',
                    ],
                    'jsmin/admin.min.js': [
                        'js/mb-sss-admin.js',
                        'js/mb-sss-nav.js',
                        'js/mb-sss-doc.js',
                        'js/mb-sss-oauth.js',
                        'js/mb-sss-media.js'
                    ],
                    'jsmin/default.min.js': [
                        'js/mb-all-event.js',
                        'js/mb-all-ajax.js'
                    ],
                    'jsmin/script.min.js': [
                        'js/mb-sss-social.js'
                    ]
                }
            }
        },
        watch: {
            css: {
                files: 'less/*.less',
            },
            js: {
                files: 'js/*.js',
                tasks: ['uglify']
            }
        }
    });

    // Load the plugins
    grunt.loadNpmTasks('grunt-contrib-less');
//    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Default task(s).
    grunt.registerTask('default', ['watch']);
};