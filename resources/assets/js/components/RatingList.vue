<template>
    <div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                <tr>
                    <th>П.І.</th>
                    <th v-for="item in subjects">{{ item.subject.name }}</th>
                </tr>
                </thead>
                <tbody>
                    <tr class="tr-shadow" v-for="item in tables">
                        <td>{{ item.student.last_name }} {{ item.student.first_name }}</td>
                        <td v-for="rating in item.subjects"><input @keyup.enter="saveNumber(rating.rating,item.student.id,rating.subject.id)" v-model="rating.rating" style="text-align: center;border: 1px solid #ccc;width: 30px;" type="text"></td>
                    </tr>
                    <tr class="spacer"></tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props:['teacher','ratings','subjects','year','semester'],
        data: function () {
            return {
                tables: this.ratings,
            }
        },
        mounted() {

        },
        methods: {
            saveNumber: function (number,student,subject) {
                this.$http.post('/api/rating/save?year=' + this.year + '&semester=' + this.month + '&semester=' + this.semester,{ number:number,subject:subject,student:student }).then(function(response) {

                }, function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>
