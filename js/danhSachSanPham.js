$('#myList').pagination({
    dataSource: function(done) {
        var page = this.pageNumber;
        $.ajax({
            url: 'index.php?controller=nuochoa&action=getNuocHoa&filter='.gt,
            type: 'GET',
            dataType: 'json',
            data: { page: page, pageSize: 10 },
            success: function(response) {
                console.log(response);
                done(response.data, response.totalCount);
            }
        });
    },
    pageSize: 12,
    formatResult: function(data) {
        for (var i = 0, len = data.length; i < len; i++) {
            data[i].a = data[i].a + ' - bad guys';
        }
    },
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})