<template>
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
            <tr>
                <th>Група</th>
                <th>Предмет</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2018-09-29 05:57</td>
                    <td>Mobile</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['teacher_id'],
        data: function () {
            return {
                groups: [],
                lessons: [],
                selectGroup: null,
            }
        },
        mounted() {
            this.$http.post('/api/groups/?teacher=' + this.teacher_id).then(function(response) {
                console.log(response);
            }, function (error) {
               console.log(error);
            });

        },
    }
</script>
