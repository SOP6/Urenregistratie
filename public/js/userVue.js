Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");
new Vue({
    el :'#manage-vue',
    data : {
        selectOptions: [{
            name: 'manager',
        },
{
    name: 'scripter'
} ],
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
        newItem : {'first_name':'','last_name':'', 'email' : '' , 'password' : '' , 'roles' : ''},
        fillItem : {'first_name':'','last_name':'','email' : '' , 'id' : '' , 'roles' : ''}
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
            this.$http.get('/useritems?page='+page).then((response) => {
                this.$set('items', response.data.data.data);
            this.$set('pagination', response.data.pagination);
        });
        },
        createItem: function() {
            var input = this.newItem;
            this.$http.post('/useritems',input).then((response) => {
                this.changePage(this.pagination.current_page);
            this.newItem = {'first_name':'','last_name':'', 'email': '' , 'password' : '' , 'roles' : ''};
            $("#create-item").modal('hide');
            toastr.success('Post Created Successfully.', 'Success Alert', {timeOut: 5000});
        }, (response) => {
                this.formErrors = response.data;
            });
        },
        deleteItem: function(item) {
            this.$http.delete('/useritems/'+item.id).then((response) => {
                this.changePage(this.pagination.current_page);
            toastr.success('Post Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        });
        },
        editItem: function(item) {
            this.fillItem.first_name = item.first_name;
            this.fillItem.last_name = item.last_name;
            this.fillItem.email = item.email;
            this.fillItem.id = item.id;
            this.fillItem.roles = item.roles;
            $("#edit-item").modal('show');
        },
        updateItem: function(item) {
            var input = this.fillItem;
            this.$http.put('/useritems/'+item.id,input).then((response) => {
                this.changePage(this.pagination.current_page);
            this.newItem = {'first_name':'','last_name':'','email' : '','id':'' , 'role' : ''};
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