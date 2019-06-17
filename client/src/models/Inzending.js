import uuid from "uuid";
import { decorate, observable, action, computed } from "mobx";

class Inzending {
	constructor(opdracht, id = uuid.v4()) {
		this.id = id;
		this.opdracht = opdracht;
	}

	setId = id => (this.id = id);
	setOpdracht = value => (this.opdracht = value);

	get values() {
		return { opdracht: this.opdracht };
	}

	updateFromServer = values => {
		this.setId(values._id);
		this.setOpdracht(values.opdracht);
	};
}

decorate(Inzending, {
	id: observable,
	setId: action,
	values: computed,
	opdracht: observable,
	setOpdracht: action
});

export default Inzending;
