<template>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <h3 class="text-center text-dark mt-2">Laravel 10 Vue JS Vite CRUD (إنشاء قراءة تحديث وحذف)</h3>
        </div>
      </div>
    </div>
    <div class="row justify-content-end">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            إضافة سجل
          </div>
          <div class="card-body">
            <form @submit.prevent="save">
              <div class="form-group">
                <label>اسم الطالب</label>
                <input type="text" class="form-control" v-model="student.name" placeholder="اسم الطالب">
              </div>
              <div class="form-group">
                <label>عنوان الطالب</label>
                <input type="text" class="form-control" v-model="student.address" placeholder="عنوان الطالب">
              </div>
              <div class="form-group">
                <label>الهاتف</label>
                <input type="text" class="form-control" v-model="student.phone" placeholder="الهاتف">
              </div>
              <button type="submit" class="btn btn-primary">حفظ</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <h2>قائمة الطلاب</h2>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">اسم الطالب</th>
              <th scope="col">العنوان</th>
              <th scope="col">الهاتف</th>
              <th scope="col">خيارات</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="student in result" :key="student.id">
              <td>{{ student.id }}</td>
              <td>{{ student.name }}</td>
              <td>{{ student.address }}</td>
              <td>{{ student.phone }}</td>
              <td>
                <button type="button" class="btn btn-warning" @click="edit(student)">تعديل</button>
                <button type="button" class="btn btn-danger" @click="remove(student)">حذف</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    name: 'Student',
    data() {
      return {
        result: {},
        student: {
          id: '',
          name: '',
          address: '',
          phone: ''
        }
      }
    },
    created() {
      this.studentLoad();
    },
    mounted() {
      console.log("mounted() called.......");
    },
    methods: {
      studentLoad() {
        var page = "http://127.0.0.1:8000/api/student";
        axios.get(page)
          .then(({data}) => {
            console.log(data);
            this.result = data;
          })
      },
      save() {
        const data = {
          name: this.student.name,
          address: this.student.address,
          phone: this.student.phone
        };
        axios.post('http://127.0.0.1:8000/api/student', data)
          .then(response => {
            console.log('تم حفظ البيانات بنجاح:', response.data);
            this.studentLoad();
          })
          .catch(error => {
            console.error('حدث خطأ أثناء حفظ البيانات:', error);
          });
      },
      edit(student) {
        this.student = student;
      },
      updateData() {
        var editrecords = 'http://127.0.0.1:8000/api/student/' + this.student.id;
        axios.put(editrecords, this.student)
          .then(({ data }) => {
            this.student.name = '';
            this.student.address = '';
            this.student.phone = '';
            this.student.id = '';
            alert("تم التحديث!!!");
            this.studentLoad();
          })
          .catch(error => {
            console.error('حدث خطأ أثناء التحديث:', error);
          });
      },
      remove(student) {
        var url = `http://127.0.0.1:8000/api/student/${student.id}`;
        axios.delete(url)
          .then(() => {
            alert("تم الحذف");
            this.studentLoad();
          })
          .catch(error => {
            console.error('حدث خطأ أثناء الحذف:', error);
          });
      }
    }
  }
  </script>
<style>
body {
  background-color: #84fcd8;
}
</style>
