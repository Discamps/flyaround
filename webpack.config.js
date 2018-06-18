var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/web')
    .addEntry('app', './assets/js/app.js')
    .addEntry('contact', './assets/js/contact.js')
    .addEntry('style', './assets/css/style.css')
    .addEntry('style', './assets/scss/main.scss')
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSassLoader(function(sassOPtion) {}, {
        resolveUrlLoader: false
    })
    .autoProvidejQuery().createSharedEntry('vendor', ['jquery', 'bootstrap-sass/stylesheets/_botstrap.scss']);

module.exports = Encore.getWebpackConfig();