//検索結果一覧表示
 <template>
    <div class="container">
    <div class="row">
    <div class="col-md-12 mx-auto">
    
    <router-link :to="{name:'detail',params:{name:searchData}}" class="list-group-item">
    {{searchData}}
    <div code="JME.class" archive="JME.jar" width=250 height=200>
    <param name="options" value="depict">
    <param name="mol" value=""> 
    </div>

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
            <td>{{searchData.author}}</td>
            </tr> 
            <tr>
            <th>登録日</th>
            <td>{{searchData.date}}</td>
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
  props:["searchData"],

  }
</script>