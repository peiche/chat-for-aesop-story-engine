/*!
 * ASE Chat Gruntfile
 * http://eichefam.net/projects/ase-chat
 * @author Paul Eiche
 */
 
/**
 * Grunt Module
 */
module.exports = function(grunt) {
	
    grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
        copy: {
            build: {
                files: [
                    {
                        cwd: 'bower_components/tgm-plugin-activation',
                        src: 'class-tgm-plugin-activation.php',
                        dest: 'inc',
                        expand: true
                    }
                ]
            }
        },
        scsslint: {
            allFiles: ['sass/*.scss'],
            options: {
                config: '.scss-lint.yml',
				reporterOutput: 'report/scss-lint-report.xml',
                colorizeOutput: true
            },
        },
        sass: {
            build: {
                options: {
                    style: 'expanded',
                    noCache: true,
                    sourcemap: 'none',
                    unixNewlines: true
                },
                files: {
                    'css/style.css': 'sass/style.scss'
                }
            },
		},
		autoprefixer: {
            build: {
                files: {
                    'css/style.css': 'css/style.css'
                }
            }
        },
        pot: {
            options: {
                text_domain: 'ase-chat',
                dest: 'languages/',
                keywords: [
                    '__',
                    '_e',
                    'esc_html__',
                    'esc_html_e',
                    'esc_attr__',
                    'esc_attr_e',
                    'esc_attr_x',
                    'esc_html_x',
                    'ngettext',
                    '_n',
                    '_ex',
                    '_nx'
                ]
            },
            build: {
                src: [
                    '**/*.php',
                    '!node_modules/**'
                ],
                expand: true
            }
        },
        watch: {
			css: {
				files: 'sass/*.scss',
				tasks: ['scsslint', 'sass', 'autoprefixer']
			}
		},
        compress: {
            build: {
                options: {
                    mode: 'zip',
                    archive: function() {
                        return 'releases/ase-chat.zip';
                    }
                },
                files: [
                    {
                        expand: true,
                        src: [
                            '**',
                            '!.*',
                            '!*.json',
                            '!*.log',
                            '!*.md',
                            '!*.xml',
                            '!GruntFile.js',
                            '!bower_components/**',
                            '!node_modules/**',
                            '!releases/**',
                            '!report/**',
                            '!sass/**'
                        ]
                    }
                ]
            }
        }
	});
    
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-compress');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-pot');
    grunt.loadNpmTasks('grunt-scss-lint');
    
    grunt.registerTask('build', ['copy', 'sass', 'autoprefixer']);
	grunt.registerTask('validate', ['scsslint']);
	grunt.registerTask('default', ['scsslint', 'watch']);
    
    grunt.registerTask('zip', 'Make a zip file for installation.', function() {
        grunt.log.writeln('Zipping up the project.');
        grunt.task.run('compress');
    });
};
