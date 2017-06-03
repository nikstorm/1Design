// import React from 'react';
// import ReactDOM from 'react-dom';
// import App from './App';
// import registerServiceWorker from './registerServiceWorker';
// import './index.css';

// ReactDOM.render(<App />, document.getElementById('root'));
// registerServiceWorker();

import { createStore } from 'redux';

function playlist(state = [],action){
	if(action.type === 'ADD_TRACK'){
		return [
		...state,
			action.payload
		];
	}
	return state;
}
const store = createStore(playlist);

const addTrackBtn = document.querySelectorAll(".addTrack")[0];
const trackInput = document.querySelectorAll('.trackInput')[0];
const list = document.querySelectorAll('.list')[0];

console.log(store.getState());

store.subscribe(() =>{
	console.log('subscribe',store.getState());
	
	list.innerHTML = '';
	document.querySelectorAll('.trackInput')[0].value = '';
	store.getState().forEach(track => {
		const li = document.createElement('li');
		li.textContent = track;
		list.appendChild(li);
	})
});
store.dispatch({type:'ADD_TRACK',payload:'Smells like spirit'});
store.dispatch({type:'ADD_TRACK',payload:'Lodochnik'});


addTrackBtn.addEventListener("click", () =>{
	const trackName = document.querySelectorAll(".trackInput")[0].value;
	console.log('trackName',trackName);
	store.dispatch({type: 'ADD_TRACK', payload: trackName})
})