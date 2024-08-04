import { Item } from './item';
import './task-manager.css';

export const TaskManger = {
  components: {
    Item,
  },
  data() {
    return {
      newItem: {
        name: '',
        position: '',
        experience: 0,
      },
      items: [],
      id: 0,
      apiUrl:
        'http://serikavj.beget.tech/rest/1/afy8tjyxkpe1jy4u/employee.list.',
    };
  },
  methods: {
    async addItem() {
      if (
        this.newItem.name.trim() &&
        this.newItem.position.trim() &&
        this.newItem.experience >= 0
      ) {
        const name = this.newItem.name;
        const position = this.newItem.position;
        const experience = this.newItem.experience;
        const data = { name, position, experience };

        const options = {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ data }),
        };

        await fetch(this.apiUrl + 'addEmployee', options);

        this.fetchGetEmployees();

        this.newItem.name = '';
        this.newItem.position = '';
        this.newItem.experience = 0;
      } else {
        alert('заполните все поня');
      }
    },
    async deleteItem(id) {
      const options = {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id }),
      };

      await fetch(this.apiUrl + 'deleteEmployee', options);
      this.fetchGetEmployees();
    },
    async editItem(data) {
      const options = {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ data }),
      };

      await fetch(this.apiUrl + 'updateEmployee', options);

      this.fetchGetEmployees();
    },
    async fetchGetEmployees() {
      const options = {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
        },
      };

      const response = await fetch(this.apiUrl + 'getEmployees').then((res) =>
        res.json()
      );
      console.log(response.result);

      this.items = response.result;
    },
  },
  mounted() {
    this.fetchGetEmployees();
  },

  // language=Vue
  template: `
		 <div>
    <h1>Список персонала</h1>
    <input v-model="newItem.name" placeholder="Имя" />
    <input v-model="newItem.position" placeholder="Должность" />
    <input v-model="newItem.experience" type="number" placeholder="Стаж" />
    <button @click="addItem">Добавить</button>
    <ul>
      <Item
        v-for="item in items"
        :key="item.ID"
        :item="item"
        @delete="deleteItem(item.ID)"
        @edit="editItem($event)"
      />
    </ul>
  </div>
	`,
};
