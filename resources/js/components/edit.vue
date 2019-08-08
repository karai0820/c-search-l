/登録ページ
<template>
 <main role="main">
    <div class="container">
        <h1 class="jumbotron-heading">Edit</h1>
    <div class="row">
    <div class="col-md-12 mx-auto">
    
    //入力フォーム
    <form class="searchform" v-on:submit.prevent="edit">
    
    //構造入力
    <div id="jsme_container1"></div>
    //パラメータ入力    
    <ul class="form-content">
          <li>
            <label class="col-md-12" for="compound_name">化合物名/L-No.</label>
            <input type ='text' class ="form-control" name="compound_name" v-model="compound_name" required>
          </li>
          <li>
          <label for="chemist">合成担当者</label>
            <input type ='text' class ="form-control" name="chemist" v-model="chemist">
          </li>
    </ul>

    //登録ボタン
    <button type="submit" class="button button--inverse">register</button>
　　</form>

{{$route.params.name}}

  </div>
  </div>
  </div>
</main>
</template>

<script>
export default {
    data() {
        return {
            saved: false,
            id:this.$route.params.name.id,
            compound_name:this.$route.params.name.compound_name,
            structure:this.$route.params.name.structure,
            chemist:this.$route.params.name.chemist,
            arr:window.sessionStorage.getItem('arr'),

        }
    },
    mounted(){
     this.$nextTick(()=>{this.getSession();});
     this.$nextTick(()=>{this.Jsme();});       
    },
    methods: {
        edit() {
            this.structure = jsmeApplet1.molFile();
            alert(this.structure);
            alert(this.chemist);
            alert(this.compound_name);

            var params = new URLSearchParams();
            params.append('compound_name',this.compound_name);
            params.append('structure',this.structure); 
            params.append('chemist',this.chemist);

            axios.patch('/api/compounds/',params).catch(error => {
                console.log(error);
                alert('修正しました');
           
                
            });
        },
      },
      Jsme(){
        let jsmeApplet1 = new JSApplet.JSME("jsme_container1", "400px", "300px");
         let mol = this.structure;
        jsmeApplet1.readMolFile(mol);
      }

    }
</script>
