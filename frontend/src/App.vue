<template>
	<v-form @submit.prevent="sendRequest" v-model="valid">
		<v-container>
			<v-row>
				<v-col
					cols="12"
					md="4"
				>
					<v-text-field
						v-model="firstname"
						:rules="nameRules"
						:counter="10"
						label="First name"
						required
					></v-text-field>
				</v-col>

				<v-col
					cols="12"
					md="4"
				>
					<v-text-field
						v-model="lastname"
						:rules="nameRules"
						:counter="10"
						label="Last name"
						required
					></v-text-field>
				</v-col>

				<v-col
					cols="12"
					md="4"
				>
					<v-text-field
						v-model="email"
						:rules="emailRules"
						label="E-mail"
						required
					></v-text-field>
				</v-col>
			</v-row>
			<v-row>
				<v-col>
					<v-btn type="submit" block class="mt-2">Submit</v-btn>
				</v-col>
			</v-row>
		</v-container>
	</v-form>
</template>

<script>
import axios from 'axios';
export default {
	data: () => ({
		valid: false,
		firstname: '',
		lastname: '',
		nameRules: [
			value => {
				if (value) return true

				return 'Name is required.'
			},
			value => {
				if (value?.length <= 10) return true

				return 'Name must be less than 10 characters.'
			},
		],
		email: '',
		emailRules: [
			value => {
				if (value) return true

				return 'E-mail is requred.'
			},
			value => {
				if (/.+@.+\..+/.test(value)) return true

				return 'E-mail must be valid.'
			},
		],
	}),
	methods: {
		sendRequest() {
			axios
				.post('http://localhost/authVue3/backend/', {
					first_name: this.firstname,
					last_name: this.lastname,
					email: this.email,
				})
				.then(response => console.log(response))
		}
	}
}
</script>

<style scoped>

</style>
