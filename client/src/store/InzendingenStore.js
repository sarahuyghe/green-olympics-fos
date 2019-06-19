import { decorate, observable, configure, action, runInAction } from "mobx";
import Inzending from "../models/Inzending";
import Api from "../api";

configure({ enforceActions: "observed" });
class InzendingenStore {
	inzendingen = [];

	constructor(rootStore) {
		this.rootStore = rootStore;
		console.log("test");
		this.api = new Api(`inzendingen`);
		this.api.getAll().then(d => d.forEach(this._addInzending));
	}

	addInzending = inzending => {
		const newInzending = new Inzending(
			inzending.opdracht,
			inzending.link,
			inzending.scouts
		);
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

decorate(InzendingenStore, {
	inzendingen: observable,
	addInzending: action
});

export default InzendingenStore;
