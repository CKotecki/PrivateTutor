<template lang="html">
    <div class="chat-composer">

      <input type= "text" placeholder="start typing" v-model="messageText" @keyup.enter>
      <button class="btn btn-primary" @click="sendMessage">Send</button>
    </div>
</template>

<script>
    export default {
      data() {
        return{
          messageText: ''
        }
      },
      methods:{
        sendMessage(){
          this.$emit('messagesent', {
            message: this.messageText,
            user: {
              name: "Luke Jaynes"
            }
            });
          this.messageText = "";
        }
      }

    }
</script>

<style lang='css'>
.chat-composer {
  display: flex;
}

.chat-composer input{
  flex: 1 auto;

}
</style>
