module.exports = function () {
    // File Paths
    var publicPath = './public/';
    var resourcesPath = './resources/assets/';
    return {
        // Declare local variables to object
        publicPath: publicPath,
        resourcesPath: resourcesPath,
        /*
         LESS CONFIG
         */
        less: {
            src: [resourcesPath + 'less/*.less'],
            dst: publicPath + 'css/',
            serve: 'app.css'
        },
        /*
         JS CONFIG
         */
        js: {
            src: [resourcesPath + 'js/*.js'],
            dst: publicPath + 'js/',
            serve: 'app.js'
        },

    };
};
