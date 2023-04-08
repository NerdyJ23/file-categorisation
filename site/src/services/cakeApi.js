import { cakeApi } from "./api";

export default {
	login(username, password) {
		let formData = new FormData();
		formData.append('username', username);
		formData.append('password', password);

		const response = cakeApi().post(`/login`, formData, {
			withCredentials: true
		}).catch((error) => {
			return error.response;
		});
		return response;
	},
	checkLoginStatus() {
		const response = cakeApi().get(`/user/checkToken`, {
			withCredentials: true
		}).catch((error) => {
			return error.response;
		});
		return response;
	}
}