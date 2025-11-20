/**
 * @implements {ICommentsApi}
 */
export default class CommentsApi {
    #url = null;
    #page = null;
    #dataEdited = false;
    /**
     * @type {CommentsResponse}
     */
    #response = null;
    /** @type {CommentsResponse[]} */
    #responses = [];
    /**
     *
     * @param {string} url example comments/paginate
     * @param {number} page
     */
    constructor(url, page) {
        this.#url = url;
        this.#page = page;
    }
    /**
     * Загружает данные с сервера и обновляет внутреннее состояние.
     *
     * @returns {Promise<this>}
     * @throws {Error} Если запрос не удался или страница недоступна
     */
    async hardFetchData() {
        this.#dataEdited = false;
        try {
            if (this.#response == null || this.#page <= json.meta.last_page) {
                const response = await fetch(`${this.#url}/${this.#page}`);

                if (!response.ok) {
                    throw false;
                }

                const json = await response.json();

                this.#response = json;
                this.#responses.push(this.#response);
                this.#dataEdited = true;
                return this;
            } else {
                this.#dataEdited = false;
                throw false;
            }
        } catch (err) {
            // console.error("hardFetchData failed:", err);
            throw err;
        }
    }

    async getData() {
        if (this.#responses.length > 1) {
            for (const key in this.#responses) {
                if (!Object.hasOwn(this.#responses, key) && this.#responses[key].meta.page === this.#page) {
                    this.#response = this.#responses[key];
                } else {
                    this.hardFetchData();
                };
            }
        } else {
            this.hardFetchData();
        }
        return this;
    }
    /**
     * @returns {Promise<CommentItem[]>}
     */
    #getItems() {
        return new Promise((res, rej) => {
            if (this.#dataEdited) {
                res(this.#response.items);
            } else {
                var time = setInterval(() => {
                    if (this.#dataEdited) {
                        clearInterval(time);
                        this.#dataEdited = true;
                        res(this.#response.items);
                    }
                }, 500);
            }
        })
    }
    items() {
        return this.#getItems();
    }
    async nextPage() {
        this.#page++;
        this.#dataEdited = false;
        if (this.#responses.length > this.#page) {
            this.#dataEdited = true;
            return this.#responses[this.#page - 1];
        }
        return await this.getData();;
    }

}
