//検索結果一覧表示
 <template>
    <div class="container">
    <div class="row">
    <div class="col-md-12 mx-auto">
    <router-link :to="{name:'detail',params:{name:searchData.compound_name}}" class="list-group-item">
    <div id="jsme_container5"></div>
        <table class="table">
        <thead>
            <tr>
            <th width="30%"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th>化合物名</th>
            <td>{{searchData.compound_name}}</td>
            </tr> 
            <tr>
            <th>合成者</th>
            <td>{{searchData.chemist}}</td>
            </tr> 
            <tr>
            <th>登録日</th>
            <td>{{searchData.created_at}}</td>
            </tr>   
        </tbody>    
        </table>
  </router-link>


  </div>
  </div>
  </div>
</template>

<script>
export default {
  name: 'List',
  props:['searchData'],
  updated(){
    this.$nextTick(()=>{this.Jsme();}); 
    this.$nextTick(()=>{this.session();}); 

  },
  methods:{
    session(){
      sessionStorage.setItem('arr',JSON.stringify(this.searchData));
         },
    Jsme(){
    let mol = this.searchData.structure;
    jsmeApplet5.readSmiles(mol);   
        },
  }
  }
 
</script>