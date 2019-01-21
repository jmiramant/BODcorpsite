module.exports = function(grunt) {
	require('jit-grunt')(grunt);
    grunt.initConfig({
        sass: {
            options: {
                sourceMap: true,
				outputStyle: 'expanded', //Values: nested, expanded, compact, compressed
				precision : 5
            },
            dist: {
                files: {
                    'style.css': 'sass/style.scss'
                }
            }
        },
        postcss: {
            options: {
                map: true,
                processors: [
                    require('autoprefixer')()
                ]
            },
            dist: {
                src: 'style.css',
                dest: 'style.css'
            }
        },
        csscomb: {
            dist: {
                files: {
                    'style.css': ['style.css']
                }
            }
        },
        watch: {
            css: {
                files: '**/*.scss',
                tasks: ['sass', 'postcss','csscomb']
            }
        }
    });
    grunt.registerTask('default', ['sass','postcss','csscomb','watch']);
}
