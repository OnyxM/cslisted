console.log('map module loaded');

class map {
	constructor(id){
		this.id = id;
		this.bounds = [];
	}
	init(){
		this.map = L.map(this.id);
		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
		    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		    maxZoom: 18,
		    id: 'mapbox.streets',
		    accessToken: 'pk.eyJ1IjoiZGFuaWdvdWtlbiIsImEiOiJjankxcGszdTMwZjE5M25tcXZwdGxtcXdoIn0.-otXiruOrtVnwFMTOg21LQ'
		}).addTo(this.map);
	}

	addPopup(lat,lng,text){
		let pnt = [lat,lng];
		this.bounds.push(pnt);
		let popup = L.popup({
			autoClose: false,
			closeButton	: false,
			closeOnClick: false,
			closeOnEscapeKey: false,
			maxWidth: 400
		})
	    .setLatLng(pnt)
	    .setContent(text)
	    .openOn(this.map)
	    .getContent();
	    return popup;

	}
	center(){
		this.map.fitBounds(this.bounds);
	}
}

$(function(){
	mapselector = 'map';

	map = new map(mapselector);
	properties = $('.property-set');
	map.init();
	cities.forEach((el) => {
		let content = `
			<div class='p-popup' id="p-${el.id}">
				<div class='font-weight-bold'><a href='/${el.id}-${el.slug}'>${el.name}</a></div>
			</div>
		`;
		let popup = map.addPopup(el.lat,el.lng,content);
	});
	map.center();
})