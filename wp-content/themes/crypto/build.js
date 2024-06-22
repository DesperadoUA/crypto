const fs = require('fs')
const { schemas } = require('./dev/schemes.js')
const { Minify } = require('./dev/Minify')
const typeBuild =
    process.argv.length === 3 && process.argv[2] === 'amp' ? 'amp' : 'default'
const configFileName = {
    css: { amp: 'amp', default: 'style' },
    js: { amp: 'amp', default: 'script' }
}
const PATH_DIST = './dist'
const getCommonScriptForPostType = (arr, fileExtension) => {
    let commonScript = ''
    for (let dir of arr) {
        commonScript += fs.readFileSync(
            `./components/${dir}/${configFileName[fileExtension][typeBuild]}.${fileExtension}`,
            'utf8'
        )
    }
    return commonScript
}
for (const postType in schemas) {
    for (const post in schemas[postType]) {
        const { css } = schemas[postType][post]
        const { js } = schemas[postType][post]
        const commonStyle = getCommonScriptForPostType(css, 'css')
        const commonScript = getCommonScriptForPostType(js, 'js')
        const fileName =
            typeBuild === 'default'
                ? schemas[postType][post]['fileName']
                : `${schemas[postType][post]['fileName']}.amp`
        fs.writeFileSync(`${PATH_DIST}/${fileName}.css`, commonStyle);
        fs.writeFileSync(`${PATH_DIST}/${fileName}.js`, commonScript);
        // Minify(commonStyle, `${PATH_DIST}/${fileName}.css`)
        // Minify(commonScript, `${PATH_DIST}/${fileName}.js`)
    }
}