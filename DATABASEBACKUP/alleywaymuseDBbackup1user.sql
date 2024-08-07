PGDMP                      |            alleywaymuseDB    16.3    16.3 �    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    19835    alleywaymuseDB    DATABASE     �   CREATE DATABASE "alleywaymuseDB" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_Indonesia.1252';
     DROP DATABASE "alleywaymuseDB";
                postgres    false            �            1259    19836    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            �            1259    19842    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    215            �           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    216            �            1259    19843 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    19846    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    217            �           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    218            �            1259    19847    password_reset_tokens    TABLE     �   CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 )   DROP TABLE public.password_reset_tokens;
       public         heap    postgres    false            �            1259    19852    password_resets    TABLE     �   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         heap    postgres    false            �            1259    19857    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    postgres    false            �            1259    19862    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          postgres    false    221            �           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          postgres    false    222            �            1259    19863    shop_addresses    TABLE     T  CREATE TABLE public.shop_addresses (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    is_primary boolean DEFAULT false NOT NULL,
    first_name character varying(255) NOT NULL,
    last_name character varying(255) NOT NULL,
    address1 character varying(255),
    address2 character varying(255),
    phone character varying(255),
    email character varying(255),
    city character varying(255),
    province character varying(255),
    postcode integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    label character varying(255)
);
 "   DROP TABLE public.shop_addresses;
       public         heap    postgres    false            �            1259    19869    shop_addresses_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.shop_addresses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.shop_addresses_id_seq;
       public          postgres    false    223            �           0    0    shop_addresses_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.shop_addresses_id_seq OWNED BY public.shop_addresses.id;
          public          postgres    false    224            �            1259    19870    shop_attribute_options    TABLE       CREATE TABLE public.shop_attribute_options (
    id bigint NOT NULL,
    attribute_id bigint NOT NULL,
    slug character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.shop_attribute_options;
       public         heap    postgres    false            �            1259    19875    shop_attribute_options_id_seq    SEQUENCE     �   CREATE SEQUENCE public.shop_attribute_options_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.shop_attribute_options_id_seq;
       public          postgres    false    225            �           0    0    shop_attribute_options_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.shop_attribute_options_id_seq OWNED BY public.shop_attribute_options.id;
          public          postgres    false    226            �            1259    19876    shop_attributes    TABLE     S  CREATE TABLE public.shop_attributes (
    id bigint NOT NULL,
    code character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    attribute_type character varying(255) NOT NULL,
    validation_rules character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 #   DROP TABLE public.shop_attributes;
       public         heap    postgres    false            �            1259    19881    shop_attributes_id_seq    SEQUENCE        CREATE SEQUENCE public.shop_attributes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.shop_attributes_id_seq;
       public          postgres    false    227            �           0    0    shop_attributes_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.shop_attributes_id_seq OWNED BY public.shop_attributes.id;
          public          postgres    false    228            �            1259    19882    shop_cart_items    TABLE     �   CREATE TABLE public.shop_cart_items (
    id bigint NOT NULL,
    cart_id bigint NOT NULL,
    product_id bigint NOT NULL,
    qty integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 #   DROP TABLE public.shop_cart_items;
       public         heap    postgres    false            �            1259    19885    shop_cart_items_id_seq    SEQUENCE        CREATE SEQUENCE public.shop_cart_items_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.shop_cart_items_id_seq;
       public          postgres    false    229            �           0    0    shop_cart_items_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.shop_cart_items_id_seq OWNED BY public.shop_cart_items.id;
          public          postgres    false    230            �            1259    19886 
   shop_carts    TABLE     �  CREATE TABLE public.shop_carts (
    id bigint NOT NULL,
    user_id bigint,
    expired_at timestamp(0) without time zone NOT NULL,
    base_total_price numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    tax_amount numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    tax_percent numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    discount_amount numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    discount_percent numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    grand_total numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    total_weight integer DEFAULT 0 NOT NULL
);
    DROP TABLE public.shop_carts;
       public         heap    postgres    false            �            1259    19895    shop_carts_id_seq    SEQUENCE     z   CREATE SEQUENCE public.shop_carts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.shop_carts_id_seq;
       public          postgres    false    231            �           0    0    shop_carts_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.shop_carts_id_seq OWNED BY public.shop_carts.id;
          public          postgres    false    232            �            1259    19896    shop_categories    TABLE       CREATE TABLE public.shop_categories (
    id bigint NOT NULL,
    parent_id bigint,
    slug character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 #   DROP TABLE public.shop_categories;
       public         heap    postgres    false            �            1259    19901    shop_categories_id_seq    SEQUENCE        CREATE SEQUENCE public.shop_categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.shop_categories_id_seq;
       public          postgres    false    233            �           0    0    shop_categories_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.shop_categories_id_seq OWNED BY public.shop_categories.id;
          public          postgres    false    234            �            1259    19902    shop_categories_products    TABLE     r   CREATE TABLE public.shop_categories_products (
    product_id bigint NOT NULL,
    category_id bigint NOT NULL
);
 ,   DROP TABLE public.shop_categories_products;
       public         heap    postgres    false            �            1259    19905    shop_order_items    TABLE     A  CREATE TABLE public.shop_order_items (
    id bigint NOT NULL,
    order_id bigint NOT NULL,
    product_id bigint NOT NULL,
    qty integer NOT NULL,
    base_price numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    base_total numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    tax_amount numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    tax_percent numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    discount_amount numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    discount_percent numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    sub_total numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    sku character varying(255) NOT NULL,
    type character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    attributes json NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 $   DROP TABLE public.shop_order_items;
       public         heap    postgres    false            �            1259    19917    shop_order_items_id_seq    SEQUENCE     �   CREATE SEQUENCE public.shop_order_items_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.shop_order_items_id_seq;
       public          postgres    false    236            �           0    0    shop_order_items_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.shop_order_items_id_seq OWNED BY public.shop_order_items.id;
          public          postgres    false    237            �            1259    19918    shop_orders    TABLE     �  CREATE TABLE public.shop_orders (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    code character varying(255) NOT NULL,
    status character varying(255) NOT NULL,
    approved_by bigint,
    approved_at timestamp(0) without time zone,
    cancelled_by bigint,
    cancelled_at timestamp(0) without time zone,
    cancellation_note text,
    order_date timestamp(0) without time zone NOT NULL,
    payment_due timestamp(0) without time zone NOT NULL,
    base_total_price numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    tax_amount numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    tax_percent numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    discount_amount numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    discount_percent numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    shipping_cost numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    grand_total numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    customer_note text,
    customer_first_name character varying(255) NOT NULL,
    customer_last_name character varying(255) NOT NULL,
    customer_address1 character varying(255),
    customer_address2 character varying(255),
    customer_phone character varying(255),
    customer_email character varying(255),
    customer_city character varying(255),
    customer_province character varying(255),
    customer_postcode integer,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    courier_name character varying(255)
);
    DROP TABLE public.shop_orders;
       public         heap    postgres    false            �            1259    19930    shop_orders_id_seq    SEQUENCE     {   CREATE SEQUENCE public.shop_orders_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.shop_orders_id_seq;
       public          postgres    false    238            �           0    0    shop_orders_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.shop_orders_id_seq OWNED BY public.shop_orders.id;
          public          postgres    false    239            �            1259    19931    shop_payments    TABLE     g  CREATE TABLE public.shop_payments (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    order_id bigint NOT NULL,
    payment_type character varying(255) NOT NULL,
    status character varying(255) NOT NULL,
    approved_by bigint,
    approved_at timestamp(0) without time zone,
    note text,
    rejected_by bigint,
    rejected_at timestamp(0) without time zone,
    rejection_note text,
    amount numeric(16,2) DEFAULT '0'::numeric NOT NULL,
    payloads json,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 !   DROP TABLE public.shop_payments;
       public         heap    postgres    false            �            1259    19937    shop_payments_id_seq    SEQUENCE     }   CREATE SEQUENCE public.shop_payments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.shop_payments_id_seq;
       public          postgres    false    240            �           0    0    shop_payments_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.shop_payments_id_seq OWNED BY public.shop_payments.id;
          public          postgres    false    241            �            1259    19938    shop_product_attributes    TABLE     �  CREATE TABLE public.shop_product_attributes (
    id bigint NOT NULL,
    product_id bigint NOT NULL,
    attribute_id bigint NOT NULL,
    string_value character varying(255),
    text_value text,
    boolean_value boolean,
    integer_value integer,
    float_value numeric(8,2),
    datetime_value timestamp(0) without time zone,
    date_value date,
    json_value text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 +   DROP TABLE public.shop_product_attributes;
       public         heap    postgres    false            �            1259    19943    shop_product_attributes_id_seq    SEQUENCE     �   CREATE SEQUENCE public.shop_product_attributes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public.shop_product_attributes_id_seq;
       public          postgres    false    242            �           0    0    shop_product_attributes_id_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public.shop_product_attributes_id_seq OWNED BY public.shop_product_attributes.id;
          public          postgres    false    243            �            1259    19944    shop_product_inventories    TABLE       CREATE TABLE public.shop_product_inventories (
    id bigint NOT NULL,
    product_id bigint NOT NULL,
    product_attribute_id bigint,
    qty integer,
    low_stock_threshold integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 ,   DROP TABLE public.shop_product_inventories;
       public         heap    postgres    false            �            1259    19947    shop_product_inventories_id_seq    SEQUENCE     �   CREATE SEQUENCE public.shop_product_inventories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.shop_product_inventories_id_seq;
       public          postgres    false    244            �           0    0    shop_product_inventories_id_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.shop_product_inventories_id_seq OWNED BY public.shop_product_inventories.id;
          public          postgres    false    245            �            1259    19948    shop_products    TABLE     E  CREATE TABLE public.shop_products (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    sku character varying(255) NOT NULL,
    type character varying(255) NOT NULL,
    parent_id bigint,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    price numeric(15,2),
    sale_price numeric(15,2),
    status character varying(255) NOT NULL,
    stock_status character varying(255) DEFAULT 'IN_STOCK'::character varying NOT NULL,
    manage_stock boolean DEFAULT false NOT NULL,
    publish_date timestamp(0) without time zone,
    excerpt text,
    body text,
    metas json,
    featured_image character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone,
    weight integer DEFAULT 0 NOT NULL
);
 !   DROP TABLE public.shop_products;
       public         heap    postgres    false            �            1259    19955    shop_products_id_seq    SEQUENCE     }   CREATE SEQUENCE public.shop_products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.shop_products_id_seq;
       public          postgres    false    246            �           0    0    shop_products_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.shop_products_id_seq OWNED BY public.shop_products.id;
          public          postgres    false    247            �            1259    19956    shop_products_tags    TABLE     g   CREATE TABLE public.shop_products_tags (
    product_id bigint NOT NULL,
    tag_id bigint NOT NULL
);
 &   DROP TABLE public.shop_products_tags;
       public         heap    postgres    false            �            1259    19959 	   shop_tags    TABLE     �   CREATE TABLE public.shop_tags (
    id bigint NOT NULL,
    slug character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.shop_tags;
       public         heap    postgres    false            �            1259    19964    shop_tags_id_seq    SEQUENCE     y   CREATE SEQUENCE public.shop_tags_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.shop_tags_id_seq;
       public          postgres    false    249                        0    0    shop_tags_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.shop_tags_id_seq OWNED BY public.shop_tags.id;
          public          postgres    false    250            �            1259    19965    users    TABLE     x  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    19970    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    251                       0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    252            �           2604    19971    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    215            �           2604    19972    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    217            �           2604    19973    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    222    221            �           2604    19974    shop_addresses id    DEFAULT     v   ALTER TABLE ONLY public.shop_addresses ALTER COLUMN id SET DEFAULT nextval('public.shop_addresses_id_seq'::regclass);
 @   ALTER TABLE public.shop_addresses ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    224    223            �           2604    19975    shop_attribute_options id    DEFAULT     �   ALTER TABLE ONLY public.shop_attribute_options ALTER COLUMN id SET DEFAULT nextval('public.shop_attribute_options_id_seq'::regclass);
 H   ALTER TABLE public.shop_attribute_options ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    226    225            �           2604    19976    shop_attributes id    DEFAULT     x   ALTER TABLE ONLY public.shop_attributes ALTER COLUMN id SET DEFAULT nextval('public.shop_attributes_id_seq'::regclass);
 A   ALTER TABLE public.shop_attributes ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    228    227            �           2604    19977    shop_cart_items id    DEFAULT     x   ALTER TABLE ONLY public.shop_cart_items ALTER COLUMN id SET DEFAULT nextval('public.shop_cart_items_id_seq'::regclass);
 A   ALTER TABLE public.shop_cart_items ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    230    229            �           2604    19978    shop_carts id    DEFAULT     n   ALTER TABLE ONLY public.shop_carts ALTER COLUMN id SET DEFAULT nextval('public.shop_carts_id_seq'::regclass);
 <   ALTER TABLE public.shop_carts ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    232    231            �           2604    19979    shop_categories id    DEFAULT     x   ALTER TABLE ONLY public.shop_categories ALTER COLUMN id SET DEFAULT nextval('public.shop_categories_id_seq'::regclass);
 A   ALTER TABLE public.shop_categories ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    234    233            �           2604    19980    shop_order_items id    DEFAULT     z   ALTER TABLE ONLY public.shop_order_items ALTER COLUMN id SET DEFAULT nextval('public.shop_order_items_id_seq'::regclass);
 B   ALTER TABLE public.shop_order_items ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    237    236            �           2604    19981    shop_orders id    DEFAULT     p   ALTER TABLE ONLY public.shop_orders ALTER COLUMN id SET DEFAULT nextval('public.shop_orders_id_seq'::regclass);
 =   ALTER TABLE public.shop_orders ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    239    238            �           2604    19982    shop_payments id    DEFAULT     t   ALTER TABLE ONLY public.shop_payments ALTER COLUMN id SET DEFAULT nextval('public.shop_payments_id_seq'::regclass);
 ?   ALTER TABLE public.shop_payments ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    241    240            �           2604    19983    shop_product_attributes id    DEFAULT     �   ALTER TABLE ONLY public.shop_product_attributes ALTER COLUMN id SET DEFAULT nextval('public.shop_product_attributes_id_seq'::regclass);
 I   ALTER TABLE public.shop_product_attributes ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    243    242            �           2604    20188    shop_product_inventories id    DEFAULT     �   ALTER TABLE ONLY public.shop_product_inventories ALTER COLUMN id SET DEFAULT nextval('public.shop_product_inventories_id_seq'::regclass);
 J   ALTER TABLE public.shop_product_inventories ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    245    244            �           2604    19985    shop_products id    DEFAULT     t   ALTER TABLE ONLY public.shop_products ALTER COLUMN id SET DEFAULT nextval('public.shop_products_id_seq'::regclass);
 ?   ALTER TABLE public.shop_products ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    247    246            �           2604    19986    shop_tags id    DEFAULT     l   ALTER TABLE ONLY public.shop_tags ALTER COLUMN id SET DEFAULT nextval('public.shop_tags_id_seq'::regclass);
 ;   ALTER TABLE public.shop_tags ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    250    249            �           2604    19987    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    252    251            �          0    19836    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    215   p�       �          0    19843 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    217   ��       �          0    19847    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public          postgres    false    219   ��       �          0    19852    password_resets 
   TABLE DATA           C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public          postgres    false    220   �       �          0    19857    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public          postgres    false    221   ,�       �          0    19863    shop_addresses 
   TABLE DATA           �   COPY public.shop_addresses (id, user_id, is_primary, first_name, last_name, address1, address2, phone, email, city, province, postcode, created_at, updated_at, label) FROM stdin;
    public          postgres    false    223   I�       �          0    19870    shop_attribute_options 
   TABLE DATA           f   COPY public.shop_attribute_options (id, attribute_id, slug, name, created_at, updated_at) FROM stdin;
    public          postgres    false    225   f�       �          0    19876    shop_attributes 
   TABLE DATA           s   COPY public.shop_attributes (id, code, name, attribute_type, validation_rules, created_at, updated_at) FROM stdin;
    public          postgres    false    227   ��       �          0    19882    shop_cart_items 
   TABLE DATA           _   COPY public.shop_cart_items (id, cart_id, product_id, qty, created_at, updated_at) FROM stdin;
    public          postgres    false    229   /�       �          0    19886 
   shop_carts 
   TABLE DATA           �   COPY public.shop_carts (id, user_id, expired_at, base_total_price, tax_amount, tax_percent, discount_amount, discount_percent, grand_total, deleted_at, created_at, updated_at, total_weight) FROM stdin;
    public          postgres    false    231   L�       �          0    19896    shop_categories 
   TABLE DATA           \   COPY public.shop_categories (id, parent_id, slug, name, created_at, updated_at) FROM stdin;
    public          postgres    false    233   i�       �          0    19902    shop_categories_products 
   TABLE DATA           K   COPY public.shop_categories_products (product_id, category_id) FROM stdin;
    public          postgres    false    235   ��       �          0    19905    shop_order_items 
   TABLE DATA           �   COPY public.shop_order_items (id, order_id, product_id, qty, base_price, base_total, tax_amount, tax_percent, discount_amount, discount_percent, sub_total, sku, type, name, attributes, created_at, updated_at) FROM stdin;
    public          postgres    false    236   F�       �          0    19918    shop_orders 
   TABLE DATA           �  COPY public.shop_orders (id, user_id, code, status, approved_by, approved_at, cancelled_by, cancelled_at, cancellation_note, order_date, payment_due, base_total_price, tax_amount, tax_percent, discount_amount, discount_percent, shipping_cost, grand_total, customer_note, customer_first_name, customer_last_name, customer_address1, customer_address2, customer_phone, customer_email, customer_city, customer_province, customer_postcode, deleted_at, created_at, updated_at, courier_name) FROM stdin;
    public          postgres    false    238   c�       �          0    19931    shop_payments 
   TABLE DATA           �   COPY public.shop_payments (id, user_id, order_id, payment_type, status, approved_by, approved_at, note, rejected_by, rejected_at, rejection_note, amount, payloads, deleted_at, created_at, updated_at) FROM stdin;
    public          postgres    false    240   ��       �          0    19938    shop_product_attributes 
   TABLE DATA           �   COPY public.shop_product_attributes (id, product_id, attribute_id, string_value, text_value, boolean_value, integer_value, float_value, datetime_value, date_value, json_value, created_at, updated_at) FROM stdin;
    public          postgres    false    242   ��       �          0    19944    shop_product_inventories 
   TABLE DATA           �   COPY public.shop_product_inventories (id, product_id, product_attribute_id, qty, low_stock_threshold, created_at, updated_at) FROM stdin;
    public          postgres    false    244   ��       �          0    19948    shop_products 
   TABLE DATA           �   COPY public.shop_products (id, user_id, sku, type, parent_id, name, slug, price, sale_price, status, stock_status, manage_stock, publish_date, excerpt, body, metas, featured_image, created_at, updated_at, deleted_at, weight) FROM stdin;
    public          postgres    false    246   *�       �          0    19956    shop_products_tags 
   TABLE DATA           @   COPY public.shop_products_tags (product_id, tag_id) FROM stdin;
    public          postgres    false    248         �          0    19959 	   shop_tags 
   TABLE DATA           K   COPY public.shop_tags (id, slug, name, created_at, updated_at) FROM stdin;
    public          postgres    false    249   m      �          0    19965    users 
   TABLE DATA           u   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public          postgres    false    251   M                 0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    216                       0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 16, true);
          public          postgres    false    218                       0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          postgres    false    222                       0    0    shop_addresses_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.shop_addresses_id_seq', 15, true);
          public          postgres    false    224                       0    0    shop_attribute_options_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.shop_attribute_options_id_seq', 1, false);
          public          postgres    false    226                       0    0    shop_attributes_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.shop_attributes_id_seq', 6, true);
          public          postgres    false    228                       0    0    shop_cart_items_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.shop_cart_items_id_seq', 50, true);
          public          postgres    false    230            	           0    0    shop_carts_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.shop_carts_id_seq', 52, true);
          public          postgres    false    232            
           0    0    shop_categories_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.shop_categories_id_seq', 24, true);
          public          postgres    false    234                       0    0    shop_order_items_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.shop_order_items_id_seq', 115, true);
          public          postgres    false    237                       0    0    shop_orders_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.shop_orders_id_seq', 112, true);
          public          postgres    false    239                       0    0    shop_payments_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.shop_payments_id_seq', 1, false);
          public          postgres    false    241                       0    0    shop_product_attributes_id_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.shop_product_attributes_id_seq', 20, true);
          public          postgres    false    243                       0    0    shop_product_inventories_id_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.shop_product_inventories_id_seq', 22, true);
          public          postgres    false    245                       0    0    shop_products_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.shop_products_id_seq', 25, true);
          public          postgres    false    247                       0    0    shop_tags_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.shop_tags_id_seq', 20, true);
          public          postgres    false    250                       0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 23, true);
          public          postgres    false    252            �           2606    19989    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    215            �           2606    19991 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    215            �           2606    19993    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    217            �           2606    19995 0   password_reset_tokens password_reset_tokens_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);
 Z   ALTER TABLE ONLY public.password_reset_tokens DROP CONSTRAINT password_reset_tokens_pkey;
       public            postgres    false    219            �           2606    19997 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            postgres    false    221            �           2606    19999 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            postgres    false    221            �           2606    20001 "   shop_addresses shop_addresses_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.shop_addresses
    ADD CONSTRAINT shop_addresses_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.shop_addresses DROP CONSTRAINT shop_addresses_pkey;
       public            postgres    false    223            �           2606    20003 2   shop_attribute_options shop_attribute_options_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.shop_attribute_options
    ADD CONSTRAINT shop_attribute_options_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.shop_attribute_options DROP CONSTRAINT shop_attribute_options_pkey;
       public            postgres    false    225            �           2606    20005 $   shop_attributes shop_attributes_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.shop_attributes
    ADD CONSTRAINT shop_attributes_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.shop_attributes DROP CONSTRAINT shop_attributes_pkey;
       public            postgres    false    227            �           2606    20007 $   shop_cart_items shop_cart_items_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.shop_cart_items
    ADD CONSTRAINT shop_cart_items_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.shop_cart_items DROP CONSTRAINT shop_cart_items_pkey;
       public            postgres    false    229            �           2606    20009    shop_carts shop_carts_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.shop_carts
    ADD CONSTRAINT shop_carts_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.shop_carts DROP CONSTRAINT shop_carts_pkey;
       public            postgres    false    231            �           2606    20011 $   shop_categories shop_categories_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.shop_categories
    ADD CONSTRAINT shop_categories_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.shop_categories DROP CONSTRAINT shop_categories_pkey;
       public            postgres    false    233            �           2606    20013 O   shop_categories_products shop_categories_products_product_id_category_id_unique 
   CONSTRAINT     �   ALTER TABLE ONLY public.shop_categories_products
    ADD CONSTRAINT shop_categories_products_product_id_category_id_unique UNIQUE (product_id, category_id);
 y   ALTER TABLE ONLY public.shop_categories_products DROP CONSTRAINT shop_categories_products_product_id_category_id_unique;
       public            postgres    false    235    235            �           2606    20015 5   shop_categories shop_categories_slug_parent_id_unique 
   CONSTRAINT     {   ALTER TABLE ONLY public.shop_categories
    ADD CONSTRAINT shop_categories_slug_parent_id_unique UNIQUE (slug, parent_id);
 _   ALTER TABLE ONLY public.shop_categories DROP CONSTRAINT shop_categories_slug_parent_id_unique;
       public            postgres    false    233    233            �           2606    20017 &   shop_order_items shop_order_items_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.shop_order_items
    ADD CONSTRAINT shop_order_items_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.shop_order_items DROP CONSTRAINT shop_order_items_pkey;
       public            postgres    false    236                       2606    20019 #   shop_orders shop_orders_code_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.shop_orders
    ADD CONSTRAINT shop_orders_code_unique UNIQUE (code);
 M   ALTER TABLE ONLY public.shop_orders DROP CONSTRAINT shop_orders_code_unique;
       public            postgres    false    238                       2606    20021    shop_orders shop_orders_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.shop_orders
    ADD CONSTRAINT shop_orders_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.shop_orders DROP CONSTRAINT shop_orders_pkey;
       public            postgres    false    238                       2606    20023     shop_payments shop_payments_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.shop_payments
    ADD CONSTRAINT shop_payments_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.shop_payments DROP CONSTRAINT shop_payments_pkey;
       public            postgres    false    240            
           2606    20025 4   shop_product_attributes shop_product_attributes_pkey 
   CONSTRAINT     r   ALTER TABLE ONLY public.shop_product_attributes
    ADD CONSTRAINT shop_product_attributes_pkey PRIMARY KEY (id);
 ^   ALTER TABLE ONLY public.shop_product_attributes DROP CONSTRAINT shop_product_attributes_pkey;
       public            postgres    false    242                       2606    20027 6   shop_product_inventories shop_product_inventories_pkey 
   CONSTRAINT     t   ALTER TABLE ONLY public.shop_product_inventories
    ADD CONSTRAINT shop_product_inventories_pkey PRIMARY KEY (id);
 `   ALTER TABLE ONLY public.shop_product_inventories DROP CONSTRAINT shop_product_inventories_pkey;
       public            postgres    false    244                       2606    20029     shop_products shop_products_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.shop_products
    ADD CONSTRAINT shop_products_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.shop_products DROP CONSTRAINT shop_products_pkey;
       public            postgres    false    246                       2606    20031 0   shop_products shop_products_sku_parent_id_unique 
   CONSTRAINT     u   ALTER TABLE ONLY public.shop_products
    ADD CONSTRAINT shop_products_sku_parent_id_unique UNIQUE (sku, parent_id);
 Z   ALTER TABLE ONLY public.shop_products DROP CONSTRAINT shop_products_sku_parent_id_unique;
       public            postgres    false    246    246                       2606    20033 >   shop_products_tags shop_products_tags_product_id_tag_id_unique 
   CONSTRAINT     �   ALTER TABLE ONLY public.shop_products_tags
    ADD CONSTRAINT shop_products_tags_product_id_tag_id_unique UNIQUE (product_id, tag_id);
 h   ALTER TABLE ONLY public.shop_products_tags DROP CONSTRAINT shop_products_tags_product_id_tag_id_unique;
       public            postgres    false    248    248                       2606    20035    shop_tags shop_tags_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.shop_tags
    ADD CONSTRAINT shop_tags_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.shop_tags DROP CONSTRAINT shop_tags_pkey;
       public            postgres    false    249                       2606    20037    shop_tags shop_tags_slug_unique 
   CONSTRAINT     Z   ALTER TABLE ONLY public.shop_tags
    ADD CONSTRAINT shop_tags_slug_unique UNIQUE (slug);
 I   ALTER TABLE ONLY public.shop_tags DROP CONSTRAINT shop_tags_slug_unique;
       public            postgres    false    249                       2606    20039    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    251                       2606    20041    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    251            �           1259    20042    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public            postgres    false    220            �           1259    20043 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            postgres    false    221    221            �           1259    20044    shop_carts_expired_at_index    INDEX     X   CREATE INDEX shop_carts_expired_at_index ON public.shop_carts USING btree (expired_at);
 /   DROP INDEX public.shop_carts_expired_at_index;
       public            postgres    false    231            �           1259    20045     shop_categories_created_at_index    INDEX     b   CREATE INDEX shop_categories_created_at_index ON public.shop_categories USING btree (created_at);
 4   DROP INDEX public.shop_categories_created_at_index;
       public            postgres    false    233            �           1259    20046    shop_categories_parent_id_index    INDEX     `   CREATE INDEX shop_categories_parent_id_index ON public.shop_categories USING btree (parent_id);
 3   DROP INDEX public.shop_categories_parent_id_index;
       public            postgres    false    233            �           1259    20047    shop_order_items_sku_index    INDEX     V   CREATE INDEX shop_order_items_sku_index ON public.shop_order_items USING btree (sku);
 .   DROP INDEX public.shop_order_items_sku_index;
       public            postgres    false    236                        1259    20048    shop_orders_code_index    INDEX     N   CREATE INDEX shop_orders_code_index ON public.shop_orders USING btree (code);
 *   DROP INDEX public.shop_orders_code_index;
       public            postgres    false    238                       1259    20049 !   shop_orders_code_order_date_index    INDEX     e   CREATE INDEX shop_orders_code_order_date_index ON public.shop_orders USING btree (code, order_date);
 5   DROP INDEX public.shop_orders_code_order_date_index;
       public            postgres    false    238    238                       1259    20050     shop_payments_payment_type_index    INDEX     b   CREATE INDEX shop_payments_payment_type_index ON public.shop_payments USING btree (payment_type);
 4   DROP INDEX public.shop_payments_payment_type_index;
       public            postgres    false    240                       1259    20051     shop_products_publish_date_index    INDEX     b   CREATE INDEX shop_products_publish_date_index ON public.shop_products USING btree (publish_date);
 4   DROP INDEX public.shop_products_publish_date_index;
       public            postgres    false    246                       1259    20052    shop_tags_created_at_index    INDEX     V   CREATE INDEX shop_tags_created_at_index ON public.shop_tags USING btree (created_at);
 .   DROP INDEX public.shop_tags_created_at_index;
       public            postgres    false    249                       2606    20053 -   shop_addresses shop_addresses_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_addresses
    ADD CONSTRAINT shop_addresses_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 W   ALTER TABLE ONLY public.shop_addresses DROP CONSTRAINT shop_addresses_user_id_foreign;
       public          postgres    false    251    4892    223                       2606    20058 B   shop_attribute_options shop_attribute_options_attribute_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_attribute_options
    ADD CONSTRAINT shop_attribute_options_attribute_id_foreign FOREIGN KEY (attribute_id) REFERENCES public.shop_attributes(id);
 l   ALTER TABLE ONLY public.shop_attribute_options DROP CONSTRAINT shop_attribute_options_attribute_id_foreign;
       public          postgres    false    225    227    4847                       2606    20063 /   shop_cart_items shop_cart_items_cart_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_cart_items
    ADD CONSTRAINT shop_cart_items_cart_id_foreign FOREIGN KEY (cart_id) REFERENCES public.shop_carts(id);
 Y   ALTER TABLE ONLY public.shop_cart_items DROP CONSTRAINT shop_cart_items_cart_id_foreign;
       public          postgres    false    4852    229    231                        2606    20068 2   shop_cart_items shop_cart_items_product_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_cart_items
    ADD CONSTRAINT shop_cart_items_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.shop_products(id);
 \   ALTER TABLE ONLY public.shop_cart_items DROP CONSTRAINT shop_cart_items_product_id_foreign;
       public          postgres    false    229    246    4878            !           2606    20073 %   shop_carts shop_carts_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_carts
    ADD CONSTRAINT shop_carts_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 O   ALTER TABLE ONLY public.shop_carts DROP CONSTRAINT shop_carts_user_id_foreign;
       public          postgres    false    231    251    4892            "           2606    20078 1   shop_categories shop_categories_parent_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_categories
    ADD CONSTRAINT shop_categories_parent_id_foreign FOREIGN KEY (parent_id) REFERENCES public.shop_categories(id);
 [   ALTER TABLE ONLY public.shop_categories DROP CONSTRAINT shop_categories_parent_id_foreign;
       public          postgres    false    233    4856    233            #           2606    20083 E   shop_categories_products shop_categories_products_category_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_categories_products
    ADD CONSTRAINT shop_categories_products_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.shop_categories(id);
 o   ALTER TABLE ONLY public.shop_categories_products DROP CONSTRAINT shop_categories_products_category_id_foreign;
       public          postgres    false    4856    233    235            $           2606    20088 D   shop_categories_products shop_categories_products_product_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_categories_products
    ADD CONSTRAINT shop_categories_products_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.shop_products(id);
 n   ALTER TABLE ONLY public.shop_categories_products DROP CONSTRAINT shop_categories_products_product_id_foreign;
       public          postgres    false    246    4878    235            %           2606    20093 2   shop_order_items shop_order_items_order_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_order_items
    ADD CONSTRAINT shop_order_items_order_id_foreign FOREIGN KEY (order_id) REFERENCES public.shop_orders(id);
 \   ALTER TABLE ONLY public.shop_order_items DROP CONSTRAINT shop_order_items_order_id_foreign;
       public          postgres    false    4869    236    238            &           2606    20098 4   shop_order_items shop_order_items_product_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_order_items
    ADD CONSTRAINT shop_order_items_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.shop_products(id);
 ^   ALTER TABLE ONLY public.shop_order_items DROP CONSTRAINT shop_order_items_product_id_foreign;
       public          postgres    false    236    4878    246            '           2606    20103 +   shop_orders shop_orders_approved_by_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_orders
    ADD CONSTRAINT shop_orders_approved_by_foreign FOREIGN KEY (approved_by) REFERENCES public.users(id);
 U   ALTER TABLE ONLY public.shop_orders DROP CONSTRAINT shop_orders_approved_by_foreign;
       public          postgres    false    4892    251    238            (           2606    20108 ,   shop_orders shop_orders_cancelled_by_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_orders
    ADD CONSTRAINT shop_orders_cancelled_by_foreign FOREIGN KEY (cancelled_by) REFERENCES public.users(id);
 V   ALTER TABLE ONLY public.shop_orders DROP CONSTRAINT shop_orders_cancelled_by_foreign;
       public          postgres    false    238    251    4892            )           2606    20113 '   shop_orders shop_orders_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_orders
    ADD CONSTRAINT shop_orders_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 Q   ALTER TABLE ONLY public.shop_orders DROP CONSTRAINT shop_orders_user_id_foreign;
       public          postgres    false    251    4892    238            *           2606    20118 /   shop_payments shop_payments_approved_by_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_payments
    ADD CONSTRAINT shop_payments_approved_by_foreign FOREIGN KEY (approved_by) REFERENCES public.users(id);
 Y   ALTER TABLE ONLY public.shop_payments DROP CONSTRAINT shop_payments_approved_by_foreign;
       public          postgres    false    240    251    4892            +           2606    20123 ,   shop_payments shop_payments_order_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_payments
    ADD CONSTRAINT shop_payments_order_id_foreign FOREIGN KEY (order_id) REFERENCES public.shop_orders(id);
 V   ALTER TABLE ONLY public.shop_payments DROP CONSTRAINT shop_payments_order_id_foreign;
       public          postgres    false    4869    238    240            ,           2606    20128 /   shop_payments shop_payments_rejected_by_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_payments
    ADD CONSTRAINT shop_payments_rejected_by_foreign FOREIGN KEY (rejected_by) REFERENCES public.users(id);
 Y   ALTER TABLE ONLY public.shop_payments DROP CONSTRAINT shop_payments_rejected_by_foreign;
       public          postgres    false    251    240    4892            -           2606    20133 +   shop_payments shop_payments_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_payments
    ADD CONSTRAINT shop_payments_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 U   ALTER TABLE ONLY public.shop_payments DROP CONSTRAINT shop_payments_user_id_foreign;
       public          postgres    false    251    4892    240            .           2606    20138 D   shop_product_attributes shop_product_attributes_attribute_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_product_attributes
    ADD CONSTRAINT shop_product_attributes_attribute_id_foreign FOREIGN KEY (attribute_id) REFERENCES public.shop_attributes(id) ON DELETE CASCADE;
 n   ALTER TABLE ONLY public.shop_product_attributes DROP CONSTRAINT shop_product_attributes_attribute_id_foreign;
       public          postgres    false    227    4847    242            /           2606    20143 B   shop_product_attributes shop_product_attributes_product_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_product_attributes
    ADD CONSTRAINT shop_product_attributes_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.shop_products(id) ON DELETE CASCADE;
 l   ALTER TABLE ONLY public.shop_product_attributes DROP CONSTRAINT shop_product_attributes_product_id_foreign;
       public          postgres    false    4878    246    242            0           2606    20148 N   shop_product_inventories shop_product_inventories_product_attribute_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_product_inventories
    ADD CONSTRAINT shop_product_inventories_product_attribute_id_foreign FOREIGN KEY (product_attribute_id) REFERENCES public.shop_product_attributes(id) ON DELETE CASCADE;
 x   ALTER TABLE ONLY public.shop_product_inventories DROP CONSTRAINT shop_product_inventories_product_attribute_id_foreign;
       public          postgres    false    4874    244    242            1           2606    20153 D   shop_product_inventories shop_product_inventories_product_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_product_inventories
    ADD CONSTRAINT shop_product_inventories_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.shop_products(id) ON DELETE CASCADE;
 n   ALTER TABLE ONLY public.shop_product_inventories DROP CONSTRAINT shop_product_inventories_product_id_foreign;
       public          postgres    false    244    246    4878            2           2606    20158 -   shop_products shop_products_parent_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_products
    ADD CONSTRAINT shop_products_parent_id_foreign FOREIGN KEY (parent_id) REFERENCES public.shop_products(id);
 W   ALTER TABLE ONLY public.shop_products DROP CONSTRAINT shop_products_parent_id_foreign;
       public          postgres    false    246    246    4878            4           2606    20163 8   shop_products_tags shop_products_tags_product_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_products_tags
    ADD CONSTRAINT shop_products_tags_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.shop_products(id);
 b   ALTER TABLE ONLY public.shop_products_tags DROP CONSTRAINT shop_products_tags_product_id_foreign;
       public          postgres    false    248    246    4878            5           2606    20168 4   shop_products_tags shop_products_tags_tag_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_products_tags
    ADD CONSTRAINT shop_products_tags_tag_id_foreign FOREIGN KEY (tag_id) REFERENCES public.shop_tags(id);
 ^   ALTER TABLE ONLY public.shop_products_tags DROP CONSTRAINT shop_products_tags_tag_id_foreign;
       public          postgres    false    248    249    4886            3           2606    20173 +   shop_products shop_products_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.shop_products
    ADD CONSTRAINT shop_products_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 U   ALTER TABLE ONLY public.shop_products DROP CONSTRAINT shop_products_user_id_foreign;
       public          postgres    false    246    251    4892            �      x������ � �      �   �   x���An� �u8L�`���Ta�6i�� +���5qV������$8H� ��M ��H!bғ���9��c��`1P����������Ŝ��Xփ��WG�����-_
䖇�#_��ڡ6�b|=�LEF=��+�G��/[0�d�'E��*�hk����ۜ�/�Bm���<���NUx�������j�/��2����M����e�7�E_�7������W��7�� i��      �   p   x����JLN5sH�M���K���T1�T14R�3���tt��
	r�4ws��)	.��4Ȫ21r��*6ʊ��.H�L
3(�7L�*4�4202�50�52S04�21�2������ ���      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �   �   x�3�t		�w�t��tJ-J,���+IMO-���4202�50�54R04�25�24�&�e1����?�3<�(/��85'5��C�!�{F�r�f�%�a�	�W?�΀ļ�ļtr�d
1�2!�y���caO�{|R���1%F��� ��d�      �      x������ � �      �      x������ � �      �   �   x�3���L�OKKM�MJM�+�ts��##]3]C#CS+S#+Cclb\� crS��3�R2�S9}���b�p�Dk5i���Ӆj�2I4�dDAbqIQ%g �§�(fbejfeb����� �N      �   =   x�Ĺ�0�Z&gʒ�]��!�A�L)�H,�r����K7��r����qW�P��IEW      �      x������ � �      �      x������ � �      �      x������ � �      �   �   x����	1�ri`�$[�l�`��#
b�5��u��3YH�\�oI��w�R�rp=Db��)����t��2 L��Hc�S�̜
�1�S�@�J5�jT�8���i�C�N=Μ��c���OM$6�Bq��/�fd�w�$�s0Z�ؼnEr���&`&w:h���� �tI.vp{�ͦ�@nv�K� ��~w��!+��ϠK���[��)�7Lt      �   �   x����	�0Dϣ*�@I��O� ��]vYD1~��
��1�����&6M��2��ˎ×�����1�N<��Z}}� �b��"�X���*�ff�$�ϬAZf�3���rT�����7�6�i}2STu���L{�GxJ��t~��Ʊ�      �   �  x��Z�r�6]��ˤJb5�~j��J�ˏ8�㚅���$��P����������I�dν _��-e��/p�=��K�f��fϣ�"��s���o_]�>��]UU�U+Jq�(Y����<O�s�����|N�^^�{��z��Ϳ~~������,�G����<�D��XFa<��V�Q���r[��m�Kq�r���W��Z�KY]��E���h)~��:���F�z_��EՎ��{��\�B�FT��D+U��N��Ep�!S�˃hd+ŝ,���j��F���ةf'�R���R��s5Fcv�5��U�Ȭ:ZZ�l�HdQ�?�t�YmDRe*ǯ|�Td��&�<�&*$�p&
U���~2*k�mܘF�wX&]>,�����u���0�u�?y��wQ��-/b�,|����j�7�x1���4�A�W�5+��y���UU��W�vT q�q�nntp�K\��_����Ĉ@�����:�jm��UILu��5J�*Q�����Ë�pm�&S�X���5޶���� �&��ѥХ-_�G�ٍ:���(���x�;�o;�#D��=������%�/Ƥ���2?Z�,2y'���Tg O-��U8���э�;cn�>8�L��dSJ��D5X2/$;�v����|Y_���z����_~R�x��[ef�J�o���qŜ��;U�U#�-S��pL�� �$�����Y�
��j�8�W"`o5'W�UC�k�T�*1DG+��Z�(��s��rש�oui��&;2 ����>�ёC2Uʼ�÷Ӄ�nC7	��	�3�RCF<1R�˚V�'c���G농���'YUܼ��wi&L�o�̄��o/��E9&�[���f�]l����I���4��=?�-1�	T����F*��f�.c���x/j����.���(ʍ���8�SQV�d��O2Pf��8�D�\��z�B�5�A&$~f�`��yR�JM9�5U!���?�y��~�w������83d�*�Ff%�
8b��@hn;��A��!�5�W��p�Vg/�D�@���Չ�:�m��A�D�u+��!��"���P��@\��.�}FBܜ�����ygN��P*,!���ψR��:>M)�:��E����9��f���Q�]e<3�5~2�^�����3Һ��p�@�(�r�s\�nq� �NF�֠�7v>9$�:	��c/U��p�᡹�@�Yؑ加�(Q�vaٚ;��CU~�@|'�@c�^�e��n\����Y���3p��;�P�٦�Y�����D����#ʀ�KhL4��+,�@�~A?hi�Y�9/�o������Šم��8p�a��#8	��䯼�����r&�Q�ep���6�NGT��t�.����F��eޤ��y@A��ߠB������O��sd$]jI5D��E��mu6r����5h��b�~Қ���م���M�-����t�y�3!���F�6�(^>�dD1|�c͂M�f��.V��)��ޕ&����rI
۴5��i���ݑV���9���zA�w�R�h����K�t���_-S�cc��2�к��o��䷮H`ucWPZ�;[�{8dGs�^���5�ĝg@	�4��T����xF`�s����@��#��:�Q�f���Yu��_�z!��"�\���:��e�Yb�jl"^WXv�貚�ۧ����o�!>w�!�ȯ�K� �\a���?x?�HR5 ��"R��$R% qdZwPIB��iF�	�>ą;�/r�ig���q>Ezt�"}�#�
��1��tbR^�;a �kW�jyl59s�0	��c�|��Xx��9����ӌ���Y����}��D&zOG �w���(�{/��i[!-�#s������x�ɷ+$F�D�˛�:Q��vH�N� u��64��:�B�wȣPٓ�{���x�q�F�V���I���4�;8!'>�w�sn�[�׏��qg�C�n�������$�����?�-�
ao�F9�m�2}V'ߕ�ȶ�b�6$4��:n�ߡ$�9���*�wBI��`�&��$�����&��XQ Qhɴ*) ���5�9�J�3��Zgd��P����]�ا�Q-8���W�	������K
h� ���*^��p�]��nv�������Ճk�aS9�vT�q-H>����\�8�nT�o����ԧ���dl���@1
G��'}N:����k���4wc���Dy����urJ-ՋH �0�PW��@\:J�A�a��� �>�����/�y���KL�ZO�yS�[1��~&�OC�Z,t���N{���Sfn�s)�����D��[t���!D�_3b�-�(�٫A�RB��Y�L��;30�����lN�R";�s����J�*�{jW��Y��#�uf-r+��d�Z���t�����Mw���Q�X��v��܁�#��eކ맶z��M���8Չqq넺pex��w�zg��en�t2\H�<�����q��Z�,UT��l����Z�ѥ�8�W MR8�����g.�>_����E=�@�k[���<g���WpJ��f��D�I��%��%��g�$�u�1�>�*7��r�w=����2��Z��k�Q"�Y4�Z�\�w@W��,��AO2z�0��:�����Fmc���C���*�Z��,��iv��MI\;y�'<�D��__�Q*@��~{�v̭������}31����u�{l!=�ٮ���&����f�]����a��&۵��s �-�[�����������l�\�=!�$s���l�КsO��3�{XLd�0����m��V�F��DEo2����r���Ɖ��Ͼ	3��v4��{Z�����;z�H]�I�m��c�S�|�ӄTW�!
�0^M���A:K�L�W�2�Qߡ�O��?'�r�iG�f��vR{�W8�Br�W�{[����������O�ꦺ��(��at|(?�_�rGI~�y�5_\,:kN]�h�YoV�����W�t���_�K{�t_<Ѯc�P���w\ �Ro����}h6M�r�}�K����+�}�w��M\ߑ��y��	c���C���8�F������ϼ��u�z���=�a�O����i񶍚%�o�ޏ����&�X�I-W���o�@��T�6�.+J�a�^����|D��O��[9S�5�;/��廒�s���{#W��4V�����i�S���I\���K�Q��ήQz�ʜ����D��~����a1Z�����U|��պ�=��W?ҍ����n�;k@��h�	��|��A^Q��E޽�{����%H7�p�6��=��> �Z_
���!�S�7%�������G��mS�=Qq�t{���������:�(����kY���#�x䡯CzԲ��x��OZ�?U0aF��:�@�^�M����b�m5��?���zG����Y;/�u�3y�tIG�w�����Q�u]��q����\�d|��c�zD��gϞ��}��      �   [   x�ͱ�0�К���]��껒9(����x�;��O�q�W�q�7��ah�p��(V1�]c���8�1�}<��������Ϊ��x�      �   �  x����n�0Eף��``)��ئ��.��]u3�&)>T����Q��	��!8�%���5��8eKl��2X؞*��^A�jn�jc���úy���XՀ���t1%�K2=e�v�x�x�˥��d=$���J�)���Y�8��7��L��\r�~It�i����	�~�⍶xڵxc����P�r�[8ĐX�(��ؒr4���q�8p�r�;��I6d��/P��"�0쪶3mt�����D]�G�\�^��oz>�D��p�A8"�Xא�;M�%xѩ�&�z�Uus�1[z6�^�Y��O)7S��#�5����g�Z_�%a�A�L��kƠm&,Sw5��� v���P�j/؉-�#�@u��^S�,%}�o'��~�9�[�Y����?��c)]O�kN�8%1��$����਴����ݼrϡ�x>b<�˕��MMl�-�S�!j5���������ܤ>      �   �   x�mȹ�0  й|�+�%N��@��CX�(J(����.ox�9y�?׸��gҳ�x�d�p�e�3?֕��O#Q���0�,�~��F�#�F��rr����I�D0��њ��s��1)2�����P)6v�~�3k��v�N
D�bP��(P�� ����Ҥ���;.9���r<<     