﻿//------------------------------------------------------------------------------
// <auto-generated>
//     Este código fue generado por una herramienta.
//     Versión de runtime:4.0.30319.42000
//
//     Los cambios en este archivo podrían causar un comportamiento incorrecto y se perderán si
//     se vuelve a generar el código.
// </auto-generated>
//------------------------------------------------------------------------------

namespace WindowsFormsApplication1.ServiceReference1 {
    using System.Data;
    
    
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    [System.ServiceModel.ServiceContractAttribute(ConfigurationName="ServiceReference1.WebService1Soap")]
    public interface WebService1Soap {
        
        [System.ServiceModel.OperationContractAttribute(Action="http://tempuri.org/listPersona", ReplyAction="*")]
        [System.ServiceModel.XmlSerializerFormatAttribute(SupportFaults=true)]
        System.Data.DataSet listPersona();
        
        [System.ServiceModel.OperationContractAttribute(Action="http://tempuri.org/listPersona", ReplyAction="*")]
        System.Threading.Tasks.Task<System.Data.DataSet> listPersonaAsync();
        
        [System.ServiceModel.OperationContractAttribute(Action="http://tempuri.org/persist", ReplyAction="*")]
        [System.ServiceModel.XmlSerializerFormatAttribute(SupportFaults=true)]
        void persist(string ci, string nombres, string paterno, string materno, string direccion, int celular);
        
        [System.ServiceModel.OperationContractAttribute(Action="http://tempuri.org/persist", ReplyAction="*")]
        System.Threading.Tasks.Task persistAsync(string ci, string nombres, string paterno, string materno, string direccion, int celular);
        
        [System.ServiceModel.OperationContractAttribute(Action="http://tempuri.org/update", ReplyAction="*")]
        [System.ServiceModel.XmlSerializerFormatAttribute(SupportFaults=true)]
        void update(string ci, string nombres, string paterno, string materno, string direccion, int celular);
        
        [System.ServiceModel.OperationContractAttribute(Action="http://tempuri.org/update", ReplyAction="*")]
        System.Threading.Tasks.Task updateAsync(string ci, string nombres, string paterno, string materno, string direccion, int celular);
        
        [System.ServiceModel.OperationContractAttribute(Action="http://tempuri.org/delete", ReplyAction="*")]
        [System.ServiceModel.XmlSerializerFormatAttribute(SupportFaults=true)]
        void delete(string ci);
        
        [System.ServiceModel.OperationContractAttribute(Action="http://tempuri.org/delete", ReplyAction="*")]
        System.Threading.Tasks.Task deleteAsync(string ci);
        
        [System.ServiceModel.OperationContractAttribute(Action="http://tempuri.org/getPersona", ReplyAction="*")]
        [System.ServiceModel.XmlSerializerFormatAttribute(SupportFaults=true)]
        string getPersona(string ci);
        
        [System.ServiceModel.OperationContractAttribute(Action="http://tempuri.org/getPersona", ReplyAction="*")]
        System.Threading.Tasks.Task<string> getPersonaAsync(string ci);
    }
    
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    public interface WebService1SoapChannel : WindowsFormsApplication1.ServiceReference1.WebService1Soap, System.ServiceModel.IClientChannel {
    }
    
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    public partial class WebService1SoapClient : System.ServiceModel.ClientBase<WindowsFormsApplication1.ServiceReference1.WebService1Soap>, WindowsFormsApplication1.ServiceReference1.WebService1Soap {
        
        public WebService1SoapClient() {
        }
        
        public WebService1SoapClient(string endpointConfigurationName) : 
                base(endpointConfigurationName) {
        }
        
        public WebService1SoapClient(string endpointConfigurationName, string remoteAddress) : 
                base(endpointConfigurationName, remoteAddress) {
        }
        
        public WebService1SoapClient(string endpointConfigurationName, System.ServiceModel.EndpointAddress remoteAddress) : 
                base(endpointConfigurationName, remoteAddress) {
        }
        
        public WebService1SoapClient(System.ServiceModel.Channels.Binding binding, System.ServiceModel.EndpointAddress remoteAddress) : 
                base(binding, remoteAddress) {
        }
        
        public System.Data.DataSet listPersona() {
            return base.Channel.listPersona();
        }
        
        public System.Threading.Tasks.Task<System.Data.DataSet> listPersonaAsync() {
            return base.Channel.listPersonaAsync();
        }
        
        public void persist(string ci, string nombres, string paterno, string materno, string direccion, int celular) {
            base.Channel.persist(ci, nombres, paterno, materno, direccion, celular);
        }
        
        public System.Threading.Tasks.Task persistAsync(string ci, string nombres, string paterno, string materno, string direccion, int celular) {
            return base.Channel.persistAsync(ci, nombres, paterno, materno, direccion, celular);
        }
        
        public void update(string ci, string nombres, string paterno, string materno, string direccion, int celular) {
            base.Channel.update(ci, nombres, paterno, materno, direccion, celular);
        }
        
        public System.Threading.Tasks.Task updateAsync(string ci, string nombres, string paterno, string materno, string direccion, int celular) {
            return base.Channel.updateAsync(ci, nombres, paterno, materno, direccion, celular);
        }
        
        public void delete(string ci) {
            base.Channel.delete(ci);
        }
        
        public System.Threading.Tasks.Task deleteAsync(string ci) {
            return base.Channel.deleteAsync(ci);
        }
        
        public string getPersona(string ci) {
            return base.Channel.getPersona(ci);
        }
        
        public System.Threading.Tasks.Task<string> getPersonaAsync(string ci) {
            return base.Channel.getPersonaAsync(ci);
        }
    }
}
