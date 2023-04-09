import Cookies from 'js-cookie'
import api from '@/services/cakeApi';

const state = {
	api: 'https://gallery.jessprogramming.com:8080',
	site: 'http://localhost',
	months: ['January','February','March','April','May','June','July','August','September','October','November','December'],
	weekday: ['Sunday', 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
	validSession: false,
	drawerExpanded: false,
  }

const getters = {
  }
const actions = {
	logout() {
		Cookies.remove('token', {path:'/'});
		window.location = '/';
	},
	async checkValidSession() {
		const response = await api.checkLoginStatus();
		if (response.status == 200) {
			state.validSession = response.data.validToken;
		} else {
			state.validSession = false;
		}
	}
}
  export default {
	state,
	actions,
	getters
}