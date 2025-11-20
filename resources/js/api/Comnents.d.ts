// {
//   "items": [
//     {
//       "author_name": "adsfasdf",
//       "content": "213213321321",
//       "approved_at": "2025-11-16T17:28:04.000000Z"
//     },
//     {
//       "author_name": "123",
//       "content": ";dsjfasddsa",
//       "approved_at": "2025-11-16T17:28:02.000000Z"
//     },
//     {
//       "author_name": "sldkjf",
//       "content": "sdkljflskdfj",
//       "approved_at": "2025-11-16T17:27:59.000000Z"
//     }
//   ],
//   "meta": {
//     "page": 1,
//     "per_page": 10,
//     "total": 3,
//     "last_page": 1,
//     "has_more": false
//   }
// }

type CommentsResponse = {
    items: CommentItem[],
    meta: {
        /**
         * Current page
         */
        page: number,
        /**
         * Max comment per page
         */
        per_page: number,
        /**
         * Current comments on a page
         */
        total: number,
        last_page: number,
        has_more: false
    }
}
type CommentItem = {
    author_name: string,
    content: string,
    /**
     * ISO 8601
     */
    approved_at: string
}
interface ICommentsApi {
    nextPage(): Promise<Response>
    previousPage(): Promise<Response>
    items(): CommentItem[]
}
