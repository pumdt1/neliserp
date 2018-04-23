<script>
    export default {

        props: [
            'list-template'
        ],

        data() {
            return {
                dataset: false,
                lists: [],
                done: false,
            }
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch(page) {
                axios.get(this.url(page))
                    .then(this.refresh);
            },

            url(page) {
                if (! page) {
                    let query = location.search.match(/page=(\d+)/);

                    page = query ? query[1] : 1;
                }

                var q = getParameterByName('q');

                return '/api' + location.pathname + '?q=' + q + '&page=' + page;
            },

            refresh(response) {
                this.dataset = response.data;
                // thisป.tasks = response.data.data;
                this.done = true;

                this.lists = response.data.data;

            }

        }
    }
</script>
