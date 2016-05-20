var webpack = require("webpack");

module.exports = {
    entry: "./js/entry.js",
    output: {
        filename: "app.js"
    },
    plugins: [
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery"
        })
    ]
};