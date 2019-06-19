class Api {
	constructor(entity) {
		this.entity = entity;
	}
	getAll = async () => {
		const r = await fetch(`/api/${this.entity}`);
		return await r.json();
	};

	create = async inzending => {
		const r = await fetch(
			`/api/${this.entity}`,
			this.getOptions("post", inzending.values)
		);
		return await r.json();
	};

	update = async inzending => {
		const r = await fetch(
			`/api/${this.entity}/${inzending.id}`,
			this.getOptions("put", inzending.values)
		);
		return await r.json();
	};

	delete = async inzending => {
		const r = await fetch(
			`/api/${this.entity}/${inzending.id}`,
			this.getOptions("delete")
		);
		return r.json();
	};

	getOptions = (method, body = null) => {
		const options = {
			method: method.toUpperCase(),
			headers: {
				"content-type": `application/json`
			}
		};
		if (body) {
			options.body = JSON.stringify(body);
		}
		return options;
	};
}

export default Api;
