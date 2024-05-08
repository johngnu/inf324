using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class Form2 : Form
    {
        ServiceReference1.WebService1SoapClient ws = new ServiceReference1.WebService1SoapClient();
        DataGridView dataGridView;
        public Form2(DataGridView dataGridView)
        {
            this.dataGridView = dataGridView;
            InitializeComponent();
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            ws.persist(textBox1.Text, textBox2.Text, textBox3.Text, textBox4.Text, textBox5.Text, Convert.ToInt32(textBox6.Text));
            this.dataGridView.DataSource = ws.listPersona().Tables["persona"];
            this.dataGridView.Refresh();
            this.Close();
        }
    }
}
