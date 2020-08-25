import Vue from "vue";
import Router from "vue-router";

import ListClients from "./components/ListClients";
import ViewClient from "./components/ViewClient";
import InsertClient from "./components/InsertClient";
import ModifyClient from "./components/ModifyClient";

import ListCompanies from "./components/ListCompanies";
import ViewCompany from "./components/ViewCompany";
import InsertCompany from "./components/InsertCompany";
import ModifyCompany from "./components/ModifyCompany";

import ListDrugs from "./components/ListDrugs";
import ViewDrug from "./components/ViewDrug";
import InsertDrug from "./components/InsertDrug";
import ModifyDrug from "./components/ModifyDrug";

// import ListDetailLines from "./components/ListDetailLines";
import ViewDetailLine from "./components/ViewDetailLine";
import ModifyDetailLine from "./components/ModifyDetailLine";

import ListInventories from "./components/ListInventories";
import ViewInventory from "./components/ViewInventory";
import InsertInventory from "./components/InsertInventory";
import ModifyInventory from "./components/ModifyInventory";

import ListProviders from "./components/ListProviders";
import ViewProvider from "./components/ViewProvider";
import InsertProvider from "./components/InsertProvider";
import ModifyProvider from "./components/ModifyProvider";

import ListSales from "./components/ListSales";
import ViewSale from "./components/ViewSale";
import InsertSale from "./components/InsertSale";
import ModifySale from "./components/ModifySale";

Vue.use(Router);

export default new Router({
    mode: "history",
    routes: [
        {
            path: "/client",
            name: "ListClients",
            component: ListClients
        },
        {
            path: "/modifyclient/:id",
            name: "ModifyClient",
            component: ModifyClient,
            props: true
        },
        {
            path: "/insertclient",
            name: "InsertClient",
            component: InsertClient
        },
        {
            path: "/client/:id",
            name: "ViewClient",
            component: ViewClient,
            props: true
        },
        {
            path: "/home",
            name: "ListDrugs",
            component: ListDrugs
        },
        {
            path: "/modifydrug/:id",
            name: "ModifyDrug",
            component: ModifyDrug,
            props: true
        },
        {
            path: "/insertdrug",
            name: "InsertDrug",
            component: InsertDrug
        },
        {
            path: "/drug/:id",
            name: "ViewDrug",
            component: ViewDrug,
            props: true
        },
        {
            path: "/company",
            name: "ListCompanies",
            component: ListCompanies
        },
        {
            path: "/modifycompany/:id",
            name: "ModifyCompany",
            component: ModifyCompany,
            props: true
        },
        {
            path: "/insertcompany",
            name: "InsertCompany",
            component: InsertCompany
        },
        {
            path: "/company/:id",
            name: "ViewCompany",
            component: ViewCompany,
            props: true
        },
        {
            path: "/modifydetailline/:id",
            name: "ModifyDetailLine",
            component: ModifyDetailLine,
            props: true
        },
        {
            path: "/detailline/:id",
            name: "ViewDetailLine",
            component: ViewDetailLine,
            props: true
        },
        {
            path: "/inventory",
            name: "ListInventories",
            component: ListInventories
        },
        {
            path: "/modifyinventory/:id",
            name: "ModifyInventory",
            component: ModifyInventory,
            props: true
        },
        {
            path: "/insertinventory",
            name: "InsertInventory",
            component: InsertInventory
        },
        {
            path: "/inventory/:id",
            name: "ViewInventory",
            component: ViewInventory,
            props: true
        },
        {
            path: "/provider",
            name: "ListProviders",
            component: ListProviders
        },
        {
            path: "/modifyprovider/:id",
            name: "ModifyProvider",
            component: ModifyProvider,
            props: true
        },
        {
            path: "/insertprovider",
            name: "InsertProvider",
            component: InsertProvider
        },
        {
            path: "/provider/:id",
            name: "ViewProvider",
            component: ViewProvider,
            props: true
        },
        {
            path: "/sale",
            name: "ListSales",
            component: ListSales
        },
        {
            path: "/modifysale/:id",
            name: "ModifySale",
            component: ModifySale,
            props: true
        },
        {
            path: "/insertsale",
            name: "InsertSale",
            component: InsertSale
        },
        {
            path: "/sale/:id",
            name: "ViewSale",
            component: ViewSale,
            props: true
        }
    ]
});
