
<script>

export default {
    data() {
      return {
          ecoCode: {},
        parentLocation: {},
        childLocation: {},
          selectedCdc: '',
        selectedChild: '',
          selectedEcoCode:'',
          iban: '',
          error: '',
      };
    },
    methods: {
      fetchChildLocation() {
        if (this.selectedCdc) {
          axios.get(`/api/get-child-location?selected_cdc=${this.selectedCdc}`)
            .then(response => {
              this.childLocation = response.data;
            })
            .catch(error => {
              console.error('Error fetching child location: ', error);
            });
        } else {
          this.childLocation = {};
        }
      },
        submitForm() {
            console.log('selectedEcoCode:', this.selectedEcoCode);
            console.log('selectedChild:', this.selectedChild);
            axios.post('/api/index-iban', {
                eco_code: this.selectedEcoCode,
                local_code: this.selectedChild,
            })
                .then(response => {
                    this.iban = response.data;
                    this.error = null;
                })
                .catch(error => {
                    this.error = error.response.data.error;
                    this.iban = null;
                });
        }
    },
    mounted() {
        axios.get('/api/eco-codes')
            .then(response => {
                this.ecoCode = response.data;
            })
            .catch(error => {
                console.error('Error fetching Eco Code: ', error);
            });

          axios.get('/api/get-parent-location')
            .then(response => {
                this.parentLocation = response.data;
            })
            .catch(error => {
              console.error('Error fetching parent location: ', error);
            });
    }
  };
</script>

<template>

        <!--Iban Form-->
    <div class="form-container">

        <div class="separator"></div>

        <div class="form-group">
            <label for="anul">Anul:</label>
            <div class="input-wrapper">
                <select class="select2">
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                </select>
            </div>
        </div>

        <div class="separator"></div>

        <div class="form-group">
            <label for="eco_code">Eco Code:</label>
            <div class="input-wrapper">
                <select class="select2" v-model="selectedEcoCode">
                    <option value="">Select Eco Code</option>
                    <option v-for="(label, code) in ecoCode" :value="code">{{code}} - {{ label }}</option>
                </select>
            </div>
        </div>

        <div class="separator"></div>

        <div class="form-group">
            <label for="raion">Raion:</label>
            <div class="input-wrapper">
                <select class="select2" v-model="selectedCdc" @change="fetchChildLocation">
                    <option value="">Select Raion</option>
                    <option v-for="(name, cdc) in parentLocation" :value="cdc">{{cdc}} - {{ name }}</option>
                </select>
            </div>
        </div>

        <div class="separator"></div>

        <div class="form-group">
            <label for="localitatea">Localitatea:</label>
            <div class="input-wrapper">
                <select class="select2" v-model="selectedChild" >
                    <option value="">Select Location</option>
                    <option v-for="(name, cdc) in childLocation" :value="cdc">{{cdc}} - {{ name }}</option>
                </select>
            </div>
        </div>

        <div class="separator"></div>

        <button @click="submitForm">Submit</button>

    </div>

        <div v-if="iban" class="iban-block iban-result">
            <p class="iban-text">Codul IBAN:</p>
            <p class="iban-code">{{ iban.iban }}</p>
        </div>
        <div v-if="error" class="iban-block iban-error">
            <p>{{ error }}</p>
        </div>

</template>




<style scoped>

.iban-block {
    border: 1px solid #333;
    border-radius: 5px;
    width: 700px;
    height: 20px;
    margin: 0 auto;
    padding: 5px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.iban-result {
    background-color: #a6e5a6;
}
.iban-error {
    background-color: #ff9393;
}
.iban-code {
    padding-left: 5px;
    font-size: 18px;
    text-align: center;
}

.form-container {
    max-width: 500px;
    margin: 20px auto;
}

.form-group {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    margin-top: 20px;

}

.form-group label {
    margin-right: 10px;
    width: 200px;
    font-size: 14px;
}

.input-wrapper {
    flex: 1;
}

.select2 {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.separator {
    position: relative;
    width: 700px;
    height: 1px;
    background-color: #a0a0a0;
    left: 50%;
    transform: translateX(-50%);
}
select {
    width: 400px !important;
}

</style>
