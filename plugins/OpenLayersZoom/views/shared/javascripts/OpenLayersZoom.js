/**
 * Display an OpenLayers map.
 *
 * target = attribute id of the div element to use
 * imgWidth = width of the image
 * imgHeight = heigh of the image
 * url = the url to the tiles directory (with final "/")
 *
 * @todo Interactive overview map, permalink, attribution.
 */
function open_layers_zoom(target, imgWidth, imgHeight, url)
{
    // This server does not support CORS, and so is incompatible with WebGL.
    var crossOrigin = undefined;
    // The zoom is set to extent after map initialization.
    var zoom = 20;
    var imgCenter = [imgWidth / 2, imgHeight / 2];
    var extent = [0, -imgHeight, imgWidth, 0];

    // Maps always need a projection, but Zoomify layers are not geo-referenced, and
    // are only measured in pixels.  So, we create a fake projection that the map
    // can use to properly display the layer.
    var projection = new ol.proj.Projection({
        code: 'xkcd-image',
        units: 'pixels',
        extent: [0, 0, imgWidth/2, imgHeight/2]
    });

    var source = new ol.source.ImageStatic({
        url: url,
        projection: projection,
        imageExtent: extent,
        attributions: '© <a href="http://xkcd.com/license.html">xkcd</a>',
        maxZoom: 2
    });

    var map = new ol.Map({
        layers: [
            new ol.layer.Image({
                source: source
            })
        ],
        logo: false,
        controls: ol.control.defaults({attribution: false}).extend([
            new ol.control.FullScreen()
        ]),
        interactions: ol.interaction.defaults().extend([
            new ol.interaction.DragRotateAndZoom()
        ]),
        interactions: ol.interaction.defaults({mouseWheelZoom:false}),
        target: target,
        view: new ol.View({
            projection: projection,
            //center: imgCenter,
            center: ol.extent.getCenter(extent),
            zoom: 0,
            maxZoom: 2
        })
    });
}
