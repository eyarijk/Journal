<template>
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
            <tr>
                <th v-for="item in th">{{ item.name }}</th>
                <th><input style="width: 50px;padding-left: 20px;" placeholder="+" @keyup.enter="addTh()" v-model="newTh"></th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="student in students">
                    <td>{{ student.full_name }}</td>
                    <td v-for="day in student.days">
                        <select v-model="day.number" @change="saveNumber(day.number,student.student_id,day.day)">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="н">н</option>
                            <option value=".">.</option>
                            <option value=""></option>
                        </select>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['couple','year','month'],
        data: function () {
            return {
                newTh: null,
                th: [],
                students: []
            }
        },
        mounted() {
            this.$http.get('/api/journal/?year=' + this.year + '&month=' + this.month + '&couple=' + this.couple).then(function(response) {
                console.log('/api/journal/?year=' + this.year + '&month=' + this.month + '&couple=' + this.couple);
                this.th       = response.data.th;
                this.students = response.data.students;
            }, function (error) {
                console.log(error);
            });
        },
        methods: {
            addTh: function () {
               if (this.newTh == '' || this.newTh < 1 || this.newTh > 31)
                   return false;

               for (var j = 0; j < this.th.length; j++) {
                   if (this.th[j].name == this.newTh) {
                       alert('Такий день вже існує!');
                       return false;
                   }
               }

               for (var i = 0; i < this.students.length; i++) {
                   this.students[i].days.push({
                       day:this.newTh,
                       number: null,
                   });
               }
               this.th.push({name:this.newTh});
               this.newTh = null;
            },
            formatNameForInput: function (student,day) {
                return 'student:' + student + ';day:' + day;
            },
            saveNumber: function (number,student,day) {
                this.$http.post('/api/journal/save/?year=' + this.year + '&month=' + this.month + '&couple=' + this.couple,{ number:number,day:day,student:student }).then(function(response) {

                }, function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>
