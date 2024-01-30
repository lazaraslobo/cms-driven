const appBaseUrl = import.meta.env.VITE_APP_URL;

const adminRoutePrefix = `/admin`
const clientRoutePrefix = `/`

export const adminRoutes = {
    admin_home: `${adminRoutePrefix}`,
    create_new_cms_page: `${adminRoutePrefix}`
}


export const clientRoutes = {
    home: `${clientRoutePrefix}`,
}
