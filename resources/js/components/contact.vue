<template>
<form class="form mt-10" action="#" @submit.prevent="sendContact">
  <div class="form__row">
      <div class="form__input-group">
          <div class="form__label-group">
              <p><label for="name" class="">Nome <abbr title="Obrigatório">*</abbr></label>
              </p>
          </div><input id="name" v-model="formData.name" autocomplete="false" tabindex="0" class="form__input">
      </div>
  </div>
  <div class="form__row">
      <div class="form__input-group">
          <div class="form__label-group">
              <p><label for="email" class="">Email <abbr title="Obrigatório">*</abbr></label>
              </p>
          </div><input id="email" v-model="formData.email" name="email" autocomplete="false" tabindex="0"
              class="form__input" required>
      </div>
  </div>
  <div class="form__row">
      <div class="form__input-group">
          <div class="form__label-group">
              <p>
                <label for="subject" class="subject">Assunto 
                  <abbr title="Obrigatório">*</abbr>
                </label>
              </p>
          </div>
          <input id="subject" name="subject" v-model="formData.subject" autocomplete="false" tabindex="0" class="form__input" required>
      </div>
  </div>
  <div class="form__row">
      <div class="form__input-group">
          <div class="form__label-group">
              <p><label for="message" class="bg-white text-gray-600 px-1">Mensagem <abbr
                          title="Obrigatório">*</abbr></label></p>
          </div><textarea id="message" name="message" v-model="formData.message" class="form__input" rows="4"
              required></textarea>
      </div>
  </div>
  <div class="mt-6 pt-3 text-center">
    <button 
        type="submit" 
        :disabled="preloader" 
        class="button button--filled button--primary"
        :class="{'cursor-not-allowed' : preloader}">
        <span v-if="preloader">Enviando....</span>
        <span v-else>Enviar</span> 
    </button>
  </div>
  <div v-if="messageSuccess">{{ messageSuccess }}</div>
  <div v-if="messageFail">{{ messageFail }}</div>
</form>
</template>

<script>
export default {
  data() {
    return {
        preloader: false,
        formData: {
            name    : '',
            email   : '',
            subject : '',
            message : ''
        },
        messageSuccess  : '',
        messageFail     : ''
    }
  },
  methods: {
      sendContact() {
          this.messageSuccess   = ''
          this.messageFail      = ''
          this.preloader        = true
          axios.post('/api/contact', this.formData)
                .then(response  => this.messageSuccess   = 'Contato enviado com sucesso')
                .catch(error    => this.messageFail      = 'Falha ao enviar contato')
                .finally(() => {
                    this.preloader   = false
                    this.reset()
                })
      },
      reset() {
          this.formData = {
            name: '',
            email: '',
            subject: '',
            message: ''
        }
      }
  }
}
</script>