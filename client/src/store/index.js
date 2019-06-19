import InzendingenStore from "./InzendingenStore";
import UiStore from "./UiStore";

class RootStore {
	constructor() {
		this.uiStore = new UiStore(this);
		this.inzendingenStore = new InzendingenStore(this);
	}
}

export default new RootStore();
