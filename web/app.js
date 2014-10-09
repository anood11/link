/**
 * Created by Dominik on 07.09.14.
 */

function getLanguage(){
    if (navigator.userLanguage == "string"){
        return(navigator.userLanguage);
    } else if (navigator.language == "string"){
        return(navigator.language);
    } else {
        return("Failed to get Language");
    }
}

function getScreenHeight(){
    if (window.screen){
        return(screen.height);
    } else {
        return(0);
    }
}

function getScreenWidth(){
    if (window.screen){
        return(screen.width);
    } else {
        return(0);
    }
}

function getPlugins(){
    var plugins = [];
    for(var i = 0; i < navigator.plugins.length; i++ ){
        var tmpArray = [];
        tmpArray["name"] = navigator.plugins[i].name;
        tmpArray["description"] = navigator.plugins[i].description;
        tmpArray["filename"] = navigator.plugins[i].filename;
        tmpArray["length"] = navigator.plugins[i].length;
        for (var a = 0; a < navigator.plugins[i].length; a++ ){
            var mimeTypes = [];
            mimeTypes["mimetype" + a] = [];
            mimeTypes["mimetype" + a]["description"] = navigator.plugins[i][a].description;
            mimeTypes["mimetype" + a]["suffixes"] = navigator.plugins[i][a].suffixes;
            mimeTypes["mimetype" + a]["type"] = navigator.plugins[i][a].type;
            tmpArray["mimetype" + a] = mimeTypes;
        }
        plugins[i] = tmpArray;
    }
    return plugins;
}

function stringifyPlugins(plugins){
    plugString = "";
    for(var i = 0; i < plugins.length-1; i++){
        plugString += "name: " + plugins[i].name + "<br/>";
        plugString += "description: " + plugins[i].description + "<br/>";
        plugString += "filename: " + plugins[i].filename + "<br/>"
        for (var a = 0; a < plugins[i].length; a++){
            plugString += "mimetype" + a + ": " + plugins[i]["mimetype" + a] + "<br/>";
            plugString += "&nbsp; &nbsp; &nbsp; type: " + plugins[i]["mimetype" + a]["mimetype" + a].type + "<br/>";
            plugString += "&nbsp; &nbsp; &nbsp; suffixes: " + plugins[i]["mimetype" + a]["mimetype" + a].suffixes + "<br/>";
            plugString += "&nbsp; &nbsp; &nbsp; description: " + plugins[i]["mimetype" + a]["mimetype" + a].description + "<br/>";

        }
        plugString += "<br/>";
    }
    return plugString;
}


// Get information
// Shows how many sites he visited before getting to your script.
var historyLength = history.length;

// Gets language that the visitor is using.
var language = getLanguage();

// Looks if Java is enabled.
var javaEnebled = navigator.javaEnabled();

// Gets screen width and height.
var screenHeight = getScreenHeight();
var screenWidth = getScreenWidth();

// Gets plattform of visitor.
var userPlattform = navigator.platform;

// Gets appName
var appName = navigator.appName;

// Gets info if cookies are enabled.
var cookiesEnabled = navigator.cookieEnabled;

// Gets all plugins and details on visitors browser.
var plugins = getPlugins();

var pluginsString = stringifyPlugins(plugins);



// Edits histroy of browser.
//history.replaceState("null", "Website", "/google.com");


$(document).ready(function(){

    $.ajax({
       type: "POST",
        url: "validate.php",
        data: { HistroyLength: historyLength,
                Language: language,
                JavaEnabled: javaEnebled,
                ScreenWidth: screenWidth,
                ScreenHeight: screenHeight,
                UserPlattform: userPlattform,
                AppName: appName,
                CookiesEnabled: cookiesEnabled,
                Plugins: pluginsString
        }
    });
});
