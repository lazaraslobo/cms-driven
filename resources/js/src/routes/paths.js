const appBaseUrl = import.meta.env.VITE_APP_URL;

export const adminRoutePrefix = `/admin`
export const clientRoutePrefix = `/`

export const adminRoutes = {
    admin_home: `${adminRoutePrefix}`,
    create_new_cms_page: `${adminRoutePrefix}/cms/create`
}


export const clientRoutes = {
    home: `${clientRoutePrefix}`,
}
