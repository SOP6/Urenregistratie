Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");
new Vue({
    el :'#manage-vue',
    data :{
        items: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
        formErrors:{},
        formErrorsUpdate:{},
        newItem : {'work_description':'','hours':'', 'user_id' : ''},
        fillItem : {'work_description':'','hours':'', 'id' : ''},
    },
    computed: {
        isActived: function() {
            return this.pagination.current_page;
        },
        pagesNumber: function() {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    ready: function() {
        this.getVueItems(this.pagination.current_page);
    },
    methods: {
        getVueItems: function(page) {
            this.$http.get('/logitems?page='+page).then((response) => {
                this.$set('items', response.data.data.data);
            this.$set('pagination', response.data.pagination);
        });
        },
        createItem: function() {
            var input = this.newItem;
            this.$http.post('/logitems',input).then((response) => {
                this.changePage(this.pagination.current_page);
            this.newItem = {'word_description':'','hours':''};
            $("#create-item").modal('hide');
            toastr.success('Post Created Successfully.', 'Success Alert', {timeOut: 5000});
        }, (response) => {
                this.formErrors = response.data;
            });
        },
        deleteItem: function(item) {
            this.$http.delete('/logitems/'+item.id).then((response) => {
                this.changePage(this.pagination.current_page);
            toastr.success('Post Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        });
        },
        editItem: function(item) {
            this.fillItem.work_description = item.work_description;
            this.fillItem.hours = item.hours;
            $("#edit-item").modal('show');
        },
        updateItem: function(item) {
            var input = this.fillItem;
            console.log(item);
            this.$http.put('/logitems/'+item.id,input).then((response) => {
                this.changePage(this.pagination.current_page);
            this.newItem = {'work_description':'','hours':'','user_id' : '','id':''};
            $("#edit-item").modal('hide');
            toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
        }, (response) => {
                this.formErrors = response.data;
            });
        },
        changePage: function(page) {
            this.pagination.current_page = page;
            this.getVueItems(page);
        }
    }
});