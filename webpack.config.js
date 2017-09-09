var Encore = require("@symfony/webpack-encore");

Encore
    .setOutputPath("web/build/")
    .setPublicPath("/build")
    .cleanupOutputBeforeBuild()
    .addEntry('app', './web/assets/js/main.js')
    .addStyleEntry('global', './web/assets/css/main.scss')
    .enableSassLoader()
    .autoProvidejQuery()
    .enableSourceMaps(!Encore.isProduction());

module.exports = Encore.getWebpackConfig();