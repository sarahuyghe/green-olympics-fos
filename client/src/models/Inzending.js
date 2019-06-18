import uuid from "uuid";
import { decorate, observable, action, computed } from "mobx";

class Inzending {
	constructor(opdracht, link, scouts, id = uuid.v4()) {
		this.id = id;
		this.opdracht = opdracht;
		this.link = link;
		this.scouts = scouts;
	}

	setId = id => (this.id = id);
	setOpdracht = value => (this.opdracht = value);
	setLink = value => (this.link = value);
	setScouts = value => (this.scouts = value);

	get values() {
		return { opdracht: this.opdracht, link: this.link, scouts: this.scouts };
	}

	updateFromServer = values => {
		this.setId(values._id);
		this.setOpdracht(values.opdracht);
		this.setLink(values.link);
		this.setScouts(values.scouts);
	};
}

decorate(Inzending, {
	id: observable,
	setId: action,
	values: computed,
	opdracht: observable,
	setOpdracht: action,
	link: observable,
	setLink: action,
	scouts: observable,
	setScouts: action
});

export default Inzending;
