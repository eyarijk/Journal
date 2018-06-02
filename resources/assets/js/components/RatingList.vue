<template>
    <div>
        <button @click="getExport" class="btn btn-dark m-b-10">Експорт</button>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <span class="nav-link tab-span" :class="getClass('rating')" @click="setStep('rating')">Рейтинг</span>
            </li>
            <li class="nav-item">
                <span class="nav-link tab-span" :class="getClass('extra')" @click="setStep('extra')">Додаткові бали</span>
            </li>
            <li class="nav-item">
                <span class="nav-link tab-span" :class="getClass('all')" @click="setStep('all')">Загальний рейтинг</span>
            </li>
        </ul>
        <div class="table-responsive table-responsive-data2" v-show="step == 'rating'">
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
        <div class="table-responsive table-responsive-data2"  v-show="step == 'extra'">
            <table class="table table-data2">
                <thead>
                <tr>
                    <th>П.І.</th>
                    <th>Додатковий бал</th>
                </tr>
                </thead>
                <tbody>
                <tr class="tr-shadow" v-for="item in tables">
                    <td>{{ item.student.last_name }} {{ item.student.first_name }}</td>
                    <td><input @keyup.enter="saveExtra(item.extra,item.student.id)" v-model="item.extra" style="text-align: center;border: 1px solid #ccc;width: 30px;" type="text"></td>
                </tr>
                <tr class="spacer"></tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive table-responsive-data2" v-show="step == 'all'">
            <table class="table table-data2">
                <thead>
                <tr>
                    <th>П.І.</th>
                    <th>Загальний рейтинг</th>
                </tr>
                </thead>
                <tbody>
                <tr class="tr-shadow" v-for="item in tables">
                    <td>{{ item.student.last_name }} {{ item.student.first_name }}</td>
                    <td v-text="getAll(item,item.student.id)"></td>
                </tr>
                <tr class="spacer"></tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props:['teacher','ratings','subjects','year','semester','group'],
        data: function () {
            return {
                tables: this.ratings,
                step: 'rating',
                error: null,
            }
        },
        mounted() {

        },
        methods: {
            saveNumber: function (number,student,subject) {
                if (number < 0 || number > 100){
                    alert('Рейтинговий бал не може бути більший ніж 100 і меньший ніж 0 !');
                    return false;
                }
                this.$http.post('/api/rating/save?year=' + this.year + '&semester=' + this.month + '&semester=' + this.semester,{ number:number,teacher:this.teacher,subject:subject,student:student }).then(function(response) {
                    if (response.body != 'Success')
                        alert(response.body);
                }, function (error) {
                    console.log(error);
                });
            },
            saveExtra: function (extra,student) {
                if (extra < 0 || extra > 10){
                    alert('Додатковий бал не може бути більший ніж 10 і меньший ніж 0 !');
                    return false;
                }
                this.$http.post('/api/rating/save/extra?year=' + this.year +  '&semester=' + this.semester,{ student:student,teacher:this.teacher,number:extra }).then(function(response) {

                }, function (error) {

                });
            },
            setStep: function (step) {
                this.step = step
            },
            getClass: function (step) {
                if (this.step == step)
                    return 'active';
                return '';
            },
            getExport: function () {
              window.location = '/api/rating/export?year=' + this.year +  '&semester=' + this.semester + '&group=' + this.group;
            },
            getAll: function (item,student) {
                var subjects = 0;
                for (var i = 0; i < item.subjects.length;i++){
                    subjects += Number(item.subjects[i].rating);
                }
                subjects /= item.subjects.length;
                subjects *=  0.9;

                var total = (Number(subjects) + Number(item.extra));
                item.all = total;

                return total;
            },
        }
    }
</script>
