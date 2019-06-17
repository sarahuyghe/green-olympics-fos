import { decorate, observable, configure, action, runInAction } from "mobx";
import Inzending from "../models/Inzending";
import Api from "../api";

configure({ enforceActions: "observed" });
class Store {
	inzendingen = [];

	constructor() {
		this.api = new Api();
		this.api.getAll().then(d => d.forEach(this._addInzending));
	}

	addInzending = inzending => {
		console.log(inzending.opdracht);
		const newInzending = new Inzending(
			inzending.opdracht,
			inzending.link,
			inzending.scouts
		);
		console.log(newInzending);
		this.inzendingen.push(newInzending);
		this.api
			.create(newInzending)
			.then(inzendingValues => newInzending.updateFromServer(inzendingValues));
	};

	_addInzending = ({ id, opdracht, link, scouts }) => {
		const inzending = new Inzending(opdracht, link, scouts, id);
		runInAction(() => this.inzendingen.push(inzending));
	};
}

decorate(Store, {
	inzendingen: observable,
	addInzending: action
});

export default new Store();
