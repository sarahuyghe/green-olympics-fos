import { decorate, observable, configure, action, runInAction } from "mobx";
import Inzending from "../models/Inzending";
import Api from "../api";

configure({ enforceActions: "observed" });
class Store {
	inzendingen = [];

	constructor() {
		this.api = new Api();
		this.api.getAll().then(d => d.forEach(this._addInzending));
		// fetch("http://localhost:4000/inzendingen")
		// 	.then(r => r.json())
		// 	.then(inzendingen => inzendingen.forEach(this._addInzending));
	}

	addInzending = inzending => {
		const newInzending = new Inzending(inzending.opdracht);
		this.inzendingen.push(newInzending);
		this.api
			.create(newInzending)
			.then(inzendingValues => newInzending.updateFromServer(inzendingValues));
	};

	_addInzending = ({ opdracht, id }) => {
		const inzending = new Inzending(opdracht, id);
		runInAction(() => this.inzendingen.push(inzending));
	};
}

decorate(Store, {
	inzendingen: observable,
	addInzending: action
});

export default new Store();
